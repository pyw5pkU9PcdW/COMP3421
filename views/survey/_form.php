<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Survey */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-form container">

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div id="questions-group">
        <ul>
        </ul>
    </div>

    <p>
    <div class="btn-group">
        <?= Html::button('New <span class="glyphicon glyphicon-plus"></span>', ['class' => 'btn btn-primary', 'id' => 'new-text-field-btn']) ?>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><?= Html::a('Text Field', '#', ['id' => 'new-text-field-btn']) ?></li>
            <li><?= Html::a('Check Box', ['update', 'id' => $model->id, 'Administrator_id' => $model->Administrator_id], ['class' => '']) ?></li>
            <li><?= Html::a('Radio Button', ['update', 'id' => $model->id, 'Administrator_id' => $model->Administrator_id], ['class' => '']) ?></li>
        </ul>
    </div>
    </p>

    <div class="form-group">
        <?= Html::input('submit', 'submit-btn', $model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<script>
    var questionNumbers = 0;
    $('#new-text-field-btn').click(function() {
        questionNumbers++;
        var content =
            '<li id="survey-question-'+questionNumbers+'"><div class="form-group field-survey-question required">' +
            '<label class="control-label" for="survey-question-title">Text Based Question</label>' +
            '<input type="text" id="survey-question-input-'+questionNumbers+'" class="form-control" onblur="validateEmpty(this)" name="Survey[title]" maxlength="500" placeholder="">' +
            '<div class="help-block"></div>' +
            '<button id="survey-question-remove-btn-'+questionNumbers+'" class="btn btn-default new-question-remove" onclick="removeQuestion('+questionNumbers+')">Remove <span class="glyphicon glyphicon-trash"></span></button>' +
            '</div></li>'
        $('#questions-group ul').append(content);
    });

    function removeQuestion(removeNum) {
        $('#survey-question-'+removeNum).remove();
        moveUpQuestionNumber(removeNum);
        questionNumbers--;
    }

    function moveUpQuestionNumber(emptyPosition) {
        for(var i = emptyPosition+1; i <= questionNumbers; i++) {
            document.getElementById('survey-question-'+i).id = 'survey-question-'+(i-1);
            document.getElementById('survey-question-input-'+i).setAttribute('id', 'survey-question-input-'+(i-1));
            document.getElementById('survey-question-remove-btn-'+i).setAttribute('onclick', 'removeQuestion('+(i-1)+')');
            document.getElementById('survey-question-remove-btn-'+i).setAttribute('id', 'survey-question-remove-btn-'+(i-1));
        }
    }

    function insertQuestion(content, order) {
        var correctAction = false;
        $.ajax({
            url: '<?= Url::to(['question/insert']) ?>',
            type: 'post',
            dataType: 'html',
            async: false,
            data:{
                _csrf: '<?= Yii::$app->request->getCsrfToken() ?>',
                surveyId: '<?= $model->id ?>',
                content: content,
                order: order
            }
        }).done(function(data) {
            if(data > 0) {
                correctAction = true;
            }
        }).fail(function(data) {
            alert('fail');
            return false;
        });
        if(correctAction) {
            return true;
        } else {
            return false;
        }
    }

    function insertTextBox() {

    }

    function validateEmpty(element) {
        if($(element).val()) {
            $(element).parent().removeClass('has-error');
            $(element).parent().addClass('has-success');
            $(element).parent().find('.help-block').empty();
            return true;
        } else {
            $(element).parent().removeClass('has-success');
            $(element).parent().addClass('has-error');
            $(element).parent().find('.help-block').empty();
            $(element).parent().find('.help-block').append('Title cannot be blank.');
            return false;
        }
    }
</script>
<?php
$js = <<< JS
    $('form#{$model->formName()}').on('beforeSubmit', function(e) {
        var \$form = $(this);
        var passValidation = true;
        for(var i = 1; i <= questionNumbers; i++) {
            if(!validateEmpty(document.getElementById('survey-question-input-'+i))) {
                passValidation = false;
            }
            if(passValidation) {
                var content = $('#survey-question-input-'+i).val();
                if(!insertQuestion(content, i)) {
                    //alert('Question '+i+' cannot be inserted');
                    return false;
                }
            }
        }
        if(!passValidation) {
            return false;
        }
        $('#questions-group').remove();
    });
JS;
$this->registerJs($js);
?>