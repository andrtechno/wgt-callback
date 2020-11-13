<?php

namespace panix\ext\callback;

use Yii;
use yii\base\Model;

class CallbackForm extends Model
{
    public $username;
    public $phone;

    public function rules()
    {
        return [
            [['username', 'phone'], 'required'],
            [['username'], 'string', 'min' => 2],
            ['phone', 'panix\ext\telinput\PhoneInputValidator']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Ваше имя',
            'phone' => 'Номер телефона'
        ];
    }

    public function sendEmail(){
        if(Yii::$app->settings->get('wgt_CallbackWidget', 'email')){
            $email = Yii::$app->settings->get('wgt_CallbackWidget', 'email');
        }else{
            $email = Yii::$app->settings->get('app', 'email');
        }
        $mailer = Yii::$app->mailer;
        $mailer->htmlLayout = '@app/mail/layouts/html';
        $mailer->compose(['html' => '@vendor/panix/wgt-callback/mail/mail.tpl'], ['model' => $this])
            ->setFrom(['noreply@' . Yii::$app->request->serverName => Yii::$app->name . ' robot'])
            ->setTo([$email => Yii::$app->name])
            ->setSubject(Yii::t('default', '☎️ Обратный звонок'))
            ->send();
        return $mailer;
    }
}