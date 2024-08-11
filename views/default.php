<?php

use panix\engine\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var \yii\web\View $this
 */
Modal::begin([
    'id' => $this->context->id,
    'title' => Yii::t('wgt_CallbackWidget/default', 'MODAL_TITLE'),
    'toggleButton' => $this->context->toggleButton,
    'size' => $this->context->size,

]);

?>

    <p><?= Yii::t('wgt_CallbackWidget/default', 'TEXT'); ?></p>
<?php


$form = ActiveForm::begin([
    'action' => ['/callback'],
    'id' => 'callback-form',
    'options' => [],
]);
$model->url = Yii::$app->request->getAbsoluteUrl();
?>
<?= $form->field($model, 'url')->hiddenInput()->label(false); ?>
<?= $form->field($model, 'username') ?>

<?= $form->field($model, 'phone')->widget(\panix\ext\telinput\PhoneInput::class) ?>


    <div class="form-group text-center">

        <?= Html::submitButton(Yii::t('wgt_CallbackWidget/default', 'BUTTON'), ['class' => 'btn btn-dark','id'=>'callback-submit']) ?>

    </div>
<?php ActiveForm::end(); ?>

<?php Modal::end();

$this->registerJs("
var xhr_callback;
$('#callback-form').on('beforeSubmit', function () {
    var form = $(this);
    
    if (typeof xhr_callback !== 'undefined')
        xhr_callback.abort();
                    
    xhr_callback = $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serializeArray(),
        beforeSend: function(){
            $('#callback-submit').attr('disabled',true);
        }
    })
    .done(function(data) {
        if(data.success) {
            $('#callback-modal').modal('hide');
            common.notify(data.message,'success');
            $('#callback-form input').val('');
        }
        $('#callback-submit').attr('disabled',false);
    })
    .fail(function () {
         // не удалось выполнить запрос к серверу
    })

    return false;
});

$('#{$this->context->id}').on('show.bs.modal', function (event) {
    $('#callbackform-phone').css({'padding-left':'100px'});
});
");
