<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Survey */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div id="questions-group">
        <ul>
        </ul>
    </div>

    <p>
    <div class="btn-group">
        <?= Html::button('New Text Field <span class="glyphicon glyphicon-align-justify"></span>', ['class' => 'btn btn-primary', 'id' => 'new-text-field-btn']) ?>
        <?= Html::button('New Check Box <span class="glyphicon glyphicon-check"></span>', ['class' => 'btn btn-primary', 'id' => 'new-check-box-question-btn']) ?>
        <?= Html::button('New Radio Button <span class="glyphicon glyphicon-record"></span>', ['class' => 'btn btn-primary', 'id' => 'new-radio-question-btn']) ?>
    </div>
    </p>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<script>
    var questionNumbers = 0;
    $('#new-text-field-btn').click(function() {
        questionNumbers++;
        questionConstructor(questionNumbers, 'Text Based Question', '', 0);
    });

    $('#new-check-box-question-btn').click(function() {
        questionNumbers++;
        var addInfo =
            '<ul id="question-options-container-'+questionNumbers+'" class="question-options-container">' +
            '<li id="question-option-'+questionNumbers+'-1" class="question-option">' +
            '<div class="input-group">' +
            '<span class="input-group-addon" id="basic-addon1">Label: </span>' +
            '<input type="text" id="question-option-input-'+questionNumbers+'-1" class="form-control" onblur="validateEmpty(this)" placeholder="Option 1..." aria-describedby="basic-addon1">' +
            '</div>' +
            '<div class="help-block"></div>' +
            '</li>'+
            '</ul>' +
            '<button type="button" id="survey-question-add-option-btn-'+questionNumbers+'" class="btn btn-default new-question-add-option" onclick="questionAddOption('+questionNumbers+')"><span class="glyphicon glyphicon-plus"></span></button>';
        questionConstructor(questionNumbers, 'Check Box Question', addInfo, 1);
    });

    $('#new-radio-question-btn').click(function() {
        alert('hi');
    });

    function removeQuestion(removeNum) {
        $('#survey-question-'+removeNum).remove();
        moveUpQuestionNumber(removeNum);
        questionNumbers--;
    }

    function questionConstructor(id, questionTitle, addInfo, questionType) {
        var content =
            '<li id="survey-question-'+id+'" type="'+questionType+'"><div class="form-group field-survey-question required">' +
            '<label class="control-label" for="survey-question-title">'+questionTitle+'</label>' +
            '<input type="text" id="survey-question-input-'+id+'" class="form-control" onblur="validateEmpty(this)" name="Survey[title]" maxlength="500" placeholder="Question '+id+'...">' +
            '<div class="help-block"></div>' +
            addInfo +
            '<button id="survey-question-remove-btn-'+id+'" class="btn btn-default new-question-remove" onclick="removeQuestion('+id+')">Remove <span class="glyphicon glyphicon-trash"></span></button>' +
            '</div></li>';
        $('#questions-group > ul').append(content);
    }

    function questionAddOption(id) {
        var currentSize = $('#question-options-container-'+id+' li').size();
        var content =
            '<li id="question-option-'+id+'-'+(currentSize+1)+'" class="question-option">' +
            '<div class="input-group">' +
            '<span class="input-group-addon" id="basic-addon1">Label: </span>' +
            '<input type="text" id="question-option-input-'+id+'-'+(currentSize+1)+'" class="form-control" onblur="validateEmpty(this)" placeholder="Option '+(currentSize+1)+'..." aria-describedby="basic-addon1">' +
            '<span class="input-group-btn"><button id="question-option-remove-btn-'+id+'-'+(currentSize+1)+'" class="btn btn-default new-option-remove" onclick="removeOption('+id+','+(currentSize+1)+')"><span class="glyphicon glyphicon-minus"></span></button></span>' +
            '</div>' +
            '<div class="help-block"></div>' +
            '</li>';
        $('#question-options-container-'+id).append(content);
    }

    function removeOption(questionId, optionId) {
        $('#question-option-'+questionId+'-'+optionId).remove();
        moveUpOptionNymber(questionId, optionId, $('#question-options-container-'+questionId+' li').size())
    }

    function moveUpOptionNymber(questionId, emptyPosition, currentSize) {
        for(var i = emptyPosition+1; i <= currentSize+1; i++) {
            document.getElementById('question-option-'+questionId+'-'+i).id = 'question-option-'+questionId+'-'+(i-1);
            document.getElementById('question-option-input-'+questionId+'-'+i).setAttribute('placeholder', 'Option '+(i-1)+'...');
            document.getElementById('question-option-input-'+questionId+'-'+i).setAttribute('id', 'question-option-input-'+questionId+'-'+(i-1));
            document.getElementById('question-option-remove-btn-'+questionId+'-'+i).setAttribute('onclick', 'removeOption('+questionId+','+(i-1)+')');
            document.getElementById('question-option-remove-btn-'+questionId+'-'+i).setAttribute('id', 'question-option-remove-btn-'+questionId+'-'+(i-1));
        }
    }

    function moveUpQuestionNumber(emptyPosition) {
        for(var i = emptyPosition+1; i <= questionNumbers; i++) {
            document.getElementById('survey-question-'+i).id = 'survey-question-'+(i-1);
            document.getElementById('survey-question-input-'+i).setAttribute('placeholder', 'Question '+(i-1)+'...');
            document.getElementById('survey-question-input-'+i).setAttribute('id', 'survey-question-input-'+(i-1));
            document.getElementById('survey-question-remove-btn-'+i).setAttribute('onclick', 'removeQuestion('+(i-1)+')');
            document.getElementById('survey-question-remove-btn-'+i).setAttribute('id', 'survey-question-remove-btn-'+(i-1));
        }
    }

    function insertQuestion(content, order) {
        var correctAction = false;
        var id = -1;
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
                id = data;
            }
        }).fail(function(data) {
            alert('fail');
            return false;
        });
        if(correctAction) {
            return id;
        } else {
            return false;
        }
    }

    function insertTextBoxProperty(id) {
        var correctAction = false;
        $.ajax({
            url: '<?= Url::to(['text-box/insert']) ?>',
            type: 'post',
            dataType: 'html',
            async: false,
            data:{
                _csrf: '<?= Yii::$app->request->getCsrfToken() ?>',
                id: id
            }
        }).done(function(data) {
            if(data == 0) {
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

    function insertCheckBox(id, content) {
        var correctAction = false;
        $.ajax({
            url: '<?= Url::to(['check-button/insert']) ?>',
            type: 'post',
            dataType: 'html',
            async: false,
            data:{
                _csrf: '<?= Yii::$app->request->getCsrfToken() ?>',
                id: id,
                content: content
            }
        }).done(function(data) {
            if(data == 0) {
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

    function validateEmpty(element) {
        if($(element).val()) {
            $(element).parent().removeClass('has-error');
            $(element).parent().addClass('has-success');
            $(element).parent().find('> .help-block').empty();
            return true;
        } else {
            $(element).parent().removeClass('has-success');
            $(element).parent().addClass('has-error');
            $(element).parent().find('> .help-block').empty();
            $(element).parent().find('> .help-block').append('Title cannot be blank.');
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
            var questionType = $('#survey-question-'+i).attr('type');
            switch (questionType) {
                case 1:
                    var size = $('#question-options-container-'+i+' li').size();
                    for (var j = 1; j <= size; j++) {
                        if(!validateEmpty($('#question-option-input-'+i+'-'+j))) {
                            passValidation = false;
                        }
                    }
                    break;
            }
        }
        if(!passValidation) {
            return false;
        }
        for(var i = 1; i <= questionNumbers; i++) {
            var content = $('#survey-question-input-'+i).val();
            var id = insertQuestion(content, i)
            if(id == false) {
                var questionType = $('#survey-question-'+i).attr('type');
                switch (questionType) {
                    case 0:
                        if(!insertTextBoxProperty(id)) {
                            //alert('Question '+i+' cannot be inserted');
                            return false;
                        }
                        break;
                    case 1:
                        var size = $('#question-options-container-'+i+' li').size();
                        for (var j = 1; j <= size; j++) {
                            if(!insertCheckBox(id, $('#question-option-input-'+i+'-'+j))) {
                                //alert('Question '+i+' cannot be inserted');
                                return false;
                            }
                        }
                        break;
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