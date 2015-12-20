<?php

namespace app\controllers;

use app\models\Checkbutton;
use app\models\Notification;
use app\models\PostReplay;
use app\models\Question;
use app\models\RadioButton;
use app\models\SurveyHasParticipant;
use app\models\TextBox;
use app\models\TextResponse;
use app\models\User;
use Faker\Provider\fr_FR\Text;
use Yii;
use app\models\Survey;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * SurveyController implements the CRUD actions for Survey model.
 */
class SurveyController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Survey models.
     * @return mixed
     */
    public function actionIndex($done = false)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Survey::find(),
        ]);

        $surveys = Survey::getEnableSurvey();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'done' => $done,
            'surveys' =>$surveys,
        ]);
    }

    /**
     * Displays a single Survey model.
     * @param integer $id
     * @param integer $Administrator_id
     * @return mixed
     */
    public function actionView($id)
    {
        $validate = false;
        $model = $this->findModel($id);

        if(Yii::$app->user->can('surveyDo') && !SurveyHasParticipant::checkParticipantHasDone($id) && $model->is_enable == 1) {
            $validate = true;
        }

        if(Yii::$app->user->can('surveyEdit')) {
            $validate = true;
        }

        if($validate) {   //The permission name
            $questionModels = [];
            $questions = Question::getAllQuestionBySurveyId($model->id);
            foreach($questions as $row) {
                $question = Question::findOne(['id' => $row['id']]);
                if($question->required == 1) {
                    $question->temp_input_required = null;
                }
                if(TextBox::checkIsTextBoxByQuestionId($row['id'])) {
                    $question->temp_type = 0;
                    array_push($questionModels, $question);
                    continue;
                }
                if(Checkbutton::checkIsCheckBoxByQuestionId($row['id'])) {
                    $question->temp_type = 1;
                    array_push($questionModels, $question);
                    continue;
                }
                if(RadioButton::checkIsRadioButtonByQuestionId($row['id'])) {
                    $question->temp_type = 2;
                    array_push($questionModels, $question);
                    continue;
                }
            }

            $post = Yii::$app->request->post();
            if(Model::loadMultiple($questionModels, $post)) {
                foreach($questionModels as $row) {
                    if($row['required'] == 1) {
                        $input = $row['temp_input_required'];
                    } else {
                        $input = $row['temp_input'];
                        if($input == '') {
                            continue;
                        }
                    }
                    if($row['temp_type'] == 0) {
                        $respond = new TextResponse();
                        $respond->content = $input;
                        $respond->TextBox_id = $row['id'];
                        $respond->save();
                    }
                    if($row['temp_type'] == 1) {
                        foreach($input as $checked) {
                            Checkbutton::increaseOptionById($checked);
                        }
                    }
                    if($row['temp_type'] == 2) {
                        Radiobutton::increaseOptionById($input);
                    }
                }
                $participant = new SurveyHasParticipant();
                $participant->Participant_id = Yii::$app->user->id;
                $participant->Survey_id = $model->id;
                $participant->datetime = date("Y-m-d H:i:s");
                $participant->save();
                \app\models\User::addScore(5, Yii::$app->user->id);
                return $this->redirect(['index', 'done' => true]);
            } else {
                //die(var_dump($questionModels));
                return $this->render('view', [
                    'model' => $model, 'questionModels' => $questionModels,
                ]);
            }
        } else {
            if(Yii::$app->user->isGuest) {
                Yii::$app->user->loginRequired();
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }
        }
    }

    /**
     * Creates a new Survey model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Survey();
        $model->id = Survey::getNewPostId();
        $model->Administrator_id = Yii::$app->user->id;
        $model->is_enable = 0;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionEnable($id) {
        $model = $this->findModel($id);
        $model->is_enable = 1;
        $model->save();
        return Yii::$app->runAction('survey/view', ['id'=>$id]);
    }

    public function actionDisable($id) {
        $model = $this->findModel($id);
        $model->is_enable = 0;
        $model->save();
        return Yii::$app->runAction('survey/view', ['id'=>$id]);
    }

    /**
     * Updates an existing Survey model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $Administrator_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Survey model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $Administrator_id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionResult2($id)
    {
        $radioButtonQuestion = [];
        $checkBoxQuestion = [];
        $radioButtonResponse = [];
        $checkBoxResponse = [];

        $model = $this->findModel($id);
        $questions = Question::getAllQuestionBySurveyId($id);

        foreach($questions as $row) {

            if(Checkbutton::checkIsCheckBoxByQuestionId($row['id'])) {
                //$question->temp_type = 1;
                array_push($checkBoxQuestion, $row);
                array_push($checkBoxResponse, Checkbutton::getOptionsStatisticsByQuestionId(($row['id'])));
                continue;
            }

            if(Radiobutton::checkIsRadioButtonByQuestionId($row['id'])) {
                //$question->temp_type = 2;
                array_push($radioButtonQuestion, $row);
                array_push($radioButtonResponse, Radiobutton::getOptionsStatisticsByQuestionId(($row['id'])));
                continue;
            }
        }


        return $this->render('result', [
            'model' => $model,
            'radioButtonQuestion' => $radioButtonQuestion, 'checkBoxQuestion' => $checkBoxQuestion,
            'radioButtonResonse' => $radioButtonResponse, 'checkBoxResponse' => $checkBoxResponse,
        ]);

    }

    public function actionResult($id) {
        if(Yii::$app->user->can('surveyResult')) {
            $model = $this->findModel($id);

            $dataProvider = [];
            $questions = Question::getAllQuestionBySurveyId($id);

            foreach($questions as $row) {
                $result['id'] = $row['id'];
                $result['question'] = Question::getQuestionContentByQuestionId($row['id']);

                if(TextBox::checkIsTextBoxByQuestionId($row['id'])) {
                    $result['type'] = 0;
                    $result['results'] = TextResponse::getResponsesByQuestionId($row['id']);
                    array_push($dataProvider, $result);
                    continue;
                }

                if(Checkbutton::checkIsCheckBoxByQuestionId($row['id'])) {
                    $result['type'] = 1;
                    $result['results'] = Checkbutton::getOptionsStatisticsByQuestionId($row['id']);
                    array_push($dataProvider, $result);
                    continue;
                }

                if(Radiobutton::checkIsRadioButtonByQuestionId($row['id'])) {
                    $result['type'] = 2;
                    $result['results'] = Radiobutton::getOptionsStatisticsByQuestionId($row['id']);
                    array_push($dataProvider, $result);
                    continue;
                }
            }

            return $this->render('result', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'doneCount' => SurveyHasParticipant::getDoneCountBySurveyId($id),
            ]);
        } else {
            if(Yii::$app->user->isGuest) {
                Yii::$app->user->loginRequired();
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }
        }
    }

    /**
     * Finds the Survey model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $Administrator_id
     * @return Survey the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Survey::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
