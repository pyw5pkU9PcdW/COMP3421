<?php

namespace app\controllers;

use app\models\AuthItem;
use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('userIndex')) {   //The permission name
            //The actions...
            $sql = 'SELECT
                    id, username, first_name, last_name, email, item_name AS userType
                    FROM 13027272d.auth_assignment, 13027272d.User
                    WHERE 13027272d.auth_assignment.user_id = 13027272d.User.id';
            $dataProvider = new ActiveDataProvider([
                'query' => User::find()
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
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
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('userView')) {   //The permission name
            //The actions...
            $model = $this->findModel($id);
            $auth = Yii::$app->authManager;
            $currentRole = $auth->getRolesByUser($model->getId());
            $role['userType'] = key($currentRole);
            return $this->render('view', [
                'model' => $model, 'role' => $role
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('userCreate')) {   //The permission name
            //The actions...
            $model = new User();
            $role = new AuthItem();
            $model->scenario = 'create';

            if ($model->load(Yii::$app->request->post())) {
                $role->load(Yii::$app->request->post());
                $model->accessToken = md5(rand(0, 1000));
                $model->score = 0;
                if($model->save()) {
                    $auth = Yii::$app->authManager;
                    $newRole = $auth->getRole($role->name);
                    $auth->assign($newRole, $model->getId());
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                return $this->render('create', [
                    'model' => $model, 'role' => $role
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
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('userUpdate')) {   //The permission name
            //The actions...
            $model = $this->findModel($id);
            $role = new AuthItem();
            $auth = Yii::$app->authManager;
            $currentRole = $auth->getRolesByUser($model->getId());
            $role->name = key($currentRole);
            $password = $model->password;
            $model->password = '';

            if ($model->load(Yii::$app->request->post())) {
                if($model->password == '') {
                    $model->password = $password;
                }
                if($model->save()) {
                    $role->load(Yii::$app->request->post());
                    $newRole = $auth->getRole($role->name);
                    if($newRole != $currentRole) {
                        $auth->revokeAll($model->getId());
                        $auth->assign($newRole, $model->getId());
                    }
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                return $this->render('update', [
                    'model' => $model, 'role' => $role
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('userDelete')) {   //The permission name
            //The actions...
            $model = $this->findModel($id);
            $auth = Yii::$app->authManager;
            $auth->revokeAll($model->getId());
            $model->delete();
            return $this->redirect(['index']);
        } else {
            if(Yii::$app->user->isGuest) {
                Yii::$app->user->loginRequired();
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
