<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\ext\taginput\TagInput;

/**
 * @var $this \yii\web\View
 * @var $model \panix\ext\callback\CallbackForm
 */
?>

<?php $form = ActiveForm::begin(); ?>

<?php
echo $form->field($model, 'email')
    ->widget(TagInput::class, ['placeholder' => 'E-mail'])
    ->hint('Введите E-mail и нажмите Enter');
?>
<div class="form-group text-center">
    <?= Html::submitButton(Yii::t('app/default', 'SAVE'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

