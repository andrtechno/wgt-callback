<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\ext\taginput\TagInput;

/**
 * @var $this \yii\web\View
 * @var $model \panix\ext\callback\CallbackForm
 */


$phones = [
    '+380682937379',//ua
    '+79855533244',//ru
    '+12126825392',//usa
    '+16468860352',//usa
    '+80800500905',
    '+61290984296',
];
foreach ($phones as $phone){
   /* $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
    $phoneNumber = $phoneUtil->parse($phone, 'UA');
//echo $phoneUtil->getCountryCodeForRegion($phoneUtil->getRegionCodeForNumber($phoneNumber));
    $phone = $phoneUtil->format($phoneNumber, \libphonenumber\PhoneNumberFormat::NATIONAL);
//\panix\engine\CMS::dump($phoneNumber);
 //   echo '+'.$phoneNumber->getCountryCode().' '.$phone.'<br>';
//\panix\engine\CMS::dump($phoneUtil->getMetadataForRegion('UA'));
    if ($phoneUtil->getRegionCodeForNumber($phoneNumber) == 'UA') {
        $pattern = "/^\+380(\d{3})(\d{3})(\d{2})(\d{2})$/";
        $phone = preg_replace($pattern, '($1) $2-$3-$4', $phone);
      //  echo $phone.'<br>';
    }else{
        echo str_replace('+'.$phoneNumber->getCountryCode(),'',$phone).'<br>';
        echo $phone.'<br>';
    }*/
   echo \panix\engine\CMS::phone_format($phone).'<br>';
}

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

