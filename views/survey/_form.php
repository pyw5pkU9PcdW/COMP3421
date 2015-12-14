<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Survey */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="survey-form">
    <link href="css/survey_form.css" rel="stylesheet">
    <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div id="questions-group">
        <ol id="questions-group-ol">
        </ol>
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
    var emptyMessage = '<h2 class="text-center" id="empty-message">The feedback form is empty</h2>';
    $('#questions-group').append(emptyMessage);

    var questionNumbers = 0;
    $('#new-text-field-btn').click(function() {
        $('#empty-message').remove();
        questionConstructor(generateUniqueId(), 'Text Based Question', '', 0);
        resetOrderNumber2();
    });

    $('#new-check-box-question-btn').click(function() {
        $('#empty-message').remove();
        var uid = generateUniqueId();
        questionConstructor(uid, 'Check Box Question', optionBasedQuestionConstructor(uid), 1);
        resetOrderNumber2()
    });

    $('#new-radio-question-btn').click(function() {
        $('#empty-message').remove();
        var uid = generateUniqueId();
        questionConstructor(uid, 'Radio Button Question', optionBasedQuestionConstructor(uid), 2);
        resetOrderNumber2()
    });

    function removeQuestion(removeNum) {
        $('#survey-question-'+removeNum).remove();
        //moveUpOptionsQuestionNumber(removeNum);
        //moveUpQuestionNumber(removeNum);
        resetOrderNumber2();
        if($('#questions-group-ol > li').size() == 0) {
            $('#questions-group').append(emptyMessage);
        }
    }

    function generateUniqueId() {
        return Math.floor((1 + Math.random()) * Date.now()).toString();
    }

    function questionConstructor(id, questionTitle, addInfo, questionType) {
        var content =
            '<li id="survey-question-'+id+'" type="'+questionType+'" uid="'+id+'" class="survey-question"><div class="form-group required">' +
            '<label class="control-label" for="survey-question-title">'+questionTitle+'</label>' +
            '<input type="text" id="survey-question-input-'+id+'" class="form-control" onblur="validateEmpty(this)" name="Survey[title]" maxlength="500" placeholder="Question '+id+'...">' +
            '<div class="help-block"></div>' +
            addInfo +
            '<button id="survey-question-remove-btn-'+id+'" class="btn btn-default new-question-remove" onclick="removeQuestion('+id+')">Remove <span class="glyphicon glyphicon-trash"></span></button>' +
            '</div></li>';
        $('#questions-group > ol').append(content);
    }

    function optionBasedQuestionConstructor(id) {
        var content =
            '<ul id="question-options-container-'+id+'" class="question-options-container">' +
            '<li id="question-option-'+id+'-1" class="question-option">' +
            '<div class="input-group">' +
            '<span class="input-group-addon" id="basic-addon1">Label: </span>' +
            '<input type="text" id="question-option-input-'+id+'-1" class="form-control" onblur="validateEmpty(this)" placeholder="Option 1..." aria-describedby="basic-addon1">' +
            '</div>' +
            '<div class="help-block"></div>' +
            '</li>'+
            '</ul>' +
            '<button type="button" id="survey-question-add-option-btn-'+id+'" class="btn btn-default new-question-add-option" onclick="questionAddOption('+id+')"><span class="glyphicon glyphicon-plus"></span></button>';
        return content;
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
        moveUpOptionNumber(questionId, optionId, $('#question-options-container-'+questionId+' li').size())
    }

    function moveUpOptionNumber(questionId, emptyPosition, currentSize) {
        for(var i = emptyPosition+1; i <= currentSize+1; i++) {
            document.getElementById('question-option-'+questionId+'-'+i).id = 'question-option-'+questionId+'-'+(i-1);
            document.getElementById('question-option-input-'+questionId+'-'+i).setAttribute('placeholder', 'Option '+(i-1)+'...');
            document.getElementById('question-option-input-'+questionId+'-'+i).setAttribute('id', 'question-option-input-'+questionId+'-'+(i-1));
            document.getElementById('question-option-remove-btn-'+questionId+'-'+i).setAttribute('onclick', 'removeOption('+questionId+','+(i-1)+')');
            document.getElementById('question-option-remove-btn-'+questionId+'-'+i).setAttribute('id', 'question-option-remove-btn-'+questionId+'-'+(i-1));
        }
    }

    function moveUpOptionsQuestionNumber(emptyPosition) {
        for(var i = emptyPosition+1; i <= questionNumbers; i++) {
            var questionType = $('#survey-question-'+i).attr('type');
            if(questionType == 1 || questionType == 2) {
                var size = $('#question-options-container-'+i+' li').size();
                for (var j = 1; j <= size; j++) {
                    document.getElementById('question-option-'+i+'-'+j).id = 'question-option-'+(i-1)+'-'+j;
                    document.getElementById('question-option-input-'+i+'-'+j).setAttribute('id', 'question-option-input-'+(i-1)+'-'+j);
                    if(j > 1) {
                        document.getElementById('question-option-remove-btn-'+i+'-'+j).setAttribute('onclick', 'removeOption('+(i-1)+','+j+')');
                        document.getElementById('question-option-remove-btn-'+i+'-'+j).setAttribute('id', 'question-option-remove-btn-'+(i-1)+'-'+j);
                    }
                }
                document.getElementById('question-options-container-'+i).id = 'question-options-container-'+(i-1);
            }
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

    $( '#questions-group-ol' ).sortable({
        containment: 'parent',
        tolerance: 'pointer',
        opacity: 0.8,
        stop: function() {
            resetOrderNumber2();
        }
    });

    function resetOrderNumber2() {
        var size = $('#questions-group-ol > li').size();
        for(var i = 1; i <= size; i++) {
            var uid = document.getElementById('questions-group-ol').children[i-1].getAttribute('uid');
            document.getElementById('survey-question-input-'+uid).setAttribute('placeholder', 'Question '+i+'...');
        }
    }

    function resetOrderNumber() {
        var size = $('#questions-group-ol li').size();
        for(var i = 1; i <= size; i++) {
            var element = document.getElementById('questions-group-ol').children[i-1];
            var currentId = element.id.split('-');
            currentId = parseInt(currentId[currentId.length-1]);
            element.id = 'survey-question-'+i;
            //alert(document.getElementById('survey-question-input-'+currentId).getAttribute('placeholder'));
            //document.getElementById('survey-question-input-'+currentId).setAttribute('placeholder', 'Question '+i+'...');
            document.getElementById('survey-question-input-'+currentId).removeAttribute('placeholder');
            //alert(document.getElementById('survey-question-input-'+currentId).getAttribute('placeholder'));
            document.getElementById('survey-question-input-'+currentId).id = 'survey-question-input-'+i;
            document.getElementById('survey-question-remove-btn-'+currentId).setAttribute('onclick', 'removeQuestion('+i+')');
            document.getElementById('survey-question-remove-btn-'+currentId).setAttribute('id', 'survey-question-remove-btn-'+i);
            var type = element.getAttribute('type');
            if(type == 1 || type == 2) {
                var size = $('#question-options-container-'+currentId+' li').size();
                for (var j = 1; j <= size; j++) {
                    document.getElementById('question-option-'+currentId+'-'+j).id = 'question-option-'+i+'-'+j;
                    document.getElementById('question-option-input-'+currentId+'-'+j).setAttribute('id', 'question-option-input-'+i+'-'+j);
                    if(j > 1) {
                        document.getElementById('question-option-remove-btn-'+currentId+'-'+j).setAttribute('onclick', 'removeOption('+i+','+j+')');
                        document.getElementById('question-option-remove-btn-'+currentId+'-'+j).setAttribute('id', 'question-option-remove-btn-'+i+'-'+j);
                    }
                }
                document.getElementById('question-options-container-'+currentId).id = 'question-options-container-'+i;
            }
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

    function insertRadioButton(id, content) {
        var correctAction = false;
        $.ajax({
            url: '<?= Url::to(['radio-button/insert']) ?>',
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
        var surveySize = $('#questions-group-ol > li').size();
        if(surveySize == 0) {
            return false;
        }
        for(var i = 1; i <= surveySize; i++) {
            var uid = document.getElementById('questions-group-ol').children[i-1].getAttribute('uid');
            if(!validateEmpty(document.getElementById('survey-question-input-'+uid))) {
                passValidation = false;
            }
            var questionType = $('#survey-question-'+uid).attr('type');
            if(questionType == 1 || questionType == 2) {
                var size = $('#question-options-container-'+uid+' li').size();
                for (var j = 1; j <= size; j++) {
                    if(!validateEmpty(document.getElementById('question-option-input-'+uid+'-'+j))) {
                        alert('find label empty');
                        passValidation = false;
                    }
                }
            }
        }
        if(!passValidation) {
            return false;
        }
        for(var i = 1; i <= surveySize; i++) {
            var uid = document.getElementById('questions-group-ol').children[i-1].getAttribute('uid');
            var content = $('#survey-question-input-'+uid).val();
            var id = insertQuestion(content, i)
            if(id != false) {
                var questionType = $('#survey-question-'+uid).attr('type');
                if(questionType == 0) {
                    if(!insertTextBoxProperty(id)) {
                        //alert('Question '+i+' cannot be inserted');
                        return false;
                    }
                }
                if(questionType == 1) {
                    var size = $('#question-options-container-'+uid+' li').size();
                    for (var j = 1; j <= size; j++) {
                        if(!insertCheckBox(id, $('#question-option-input-'+uid+'-'+j).val())) {
                            //alert('Question '+i+' cannot be inserted');
                            return false;
                        }
                    }
                }
                if(questionType == 2) {
                    var size = $('#question-options-container-'+uid+' li').size();
                    for (var j = 1; j <= size; j++) {
                        if(!insertRadioButton(id, $('#question-option-input-'+uid+'-'+j).val())) {
                            //alert('Question '+i+' cannot be inserted');
                            return false;
                        }
                    }
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