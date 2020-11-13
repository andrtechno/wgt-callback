<?php
use panix\engine\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var \yii\web\View $this
 */
Modal::begin([
        'id'=>$this->context->id,
    'title' => 'Обратный звонок',
   // 'toggleButton' =>  $this->context->toggleButton,
    'toggleButton' => $this->context->toggleButton,
    'size' => $this->context->size,
    'closeButton' => [
        'label' => '<svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg>'
    ],
]);

?>

    <p>Введите, пожалуйста, имя и ваш номер телефона, наш менеджер свяжется с вами в ближайшее время</p>
<?php


$form = ActiveForm::begin([
    'action' => ['/callback'],
    'id' => 'callback-form',
    'options' => ['class' => ''],
]) ?>
<?= $form->field($model, 'username',['options'=>['class'=>'form-group form-group-auto']]) ?>
<?= $form->field($model, 'phone',['options'=>['class'=>'form-group form-group-auto2']])->widget(\panix\ext\telinput\PhoneInput::class) ?>


    <div class="form-group text-center">

        <?= Html::submitButton('Перезвонить мне', ['class' => 'btn btn-outline-danger']) ?>

    </div>
<?php ActiveForm::end(); ?>

<?php Modal::end();

$this->registerJs("

$('#callback-form').on('beforeSubmit', function () {
    var form = $(this);
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serializeArray()
    })
    .done(function(data) {
       if(data.success) {
            $('#callback-modal').modal('hide');
            common.notify(data.message,'success');
        }
    })
    .fail(function () {
         // не удалось выполнить запрос к серверу
    })

    return false;
})
");