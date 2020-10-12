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
<?= $form->field($model, 'phone',['options'=>['class'=>'form-group form-group-auto']])->widget(\panix\engine\widgets\MaskedInput::class,['mask'=>'+38 (099) 999-99-99']) ?>


    <div class="form-group text-center">

        <?= Html::submitButton('Перезвонить мне', ['class' => 'btn btn-outline-danger']) ?>

    </div>
<?php ActiveForm::end(); ?>

<?php Modal::end();

$this->registerJs("

$('#callback-form').on('beforeSubmit', function () {
    var yiiform = $(this);
    // отправляем данные на сервер
    $.ajax({
            type: yiiform.attr('method'),
            url: yiiform.attr('action'),
            data: yiiform.serializeArray()
        }
    )
    .done(function(data) {
       if(data.success) {
          // данные сохранены
        } else {
          // сервер вернул ошибку и не сохранил наши данные
        }
    })
    .fail(function () {
         // не удалось выполнить запрос к серверу
    })

    return false; // отменяем отправку данных формы
})
");