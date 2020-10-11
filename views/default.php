<?php
use panix\engine\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
    'id' => 'callback-form',
    'options' => ['class' => 'form-auto'],
]) ?>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'phone') ?>


    <div class="form-group text-center">

        <?= Html::submitButton('Перезвонить мне', ['class' => 'btn btn-outline-danger']) ?>

    </div>
<?php ActiveForm::end(); ?>

<?php Modal::end();