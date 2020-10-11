<?php

namespace panix\ext\callback;

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
        $mailer = Yii::$app->mailer;
        $mailer->compose(['html' => 'mail.tpl'], ['model' => $this])
            ->setFrom(['noreply@' . Yii::$app->request->serverName => Yii::$app->name . ' robot'])
            ->setTo([Yii::$app->settings->get('wgt_CallbackWidget', 'email') => Yii::$app->name])
            ->setSubject(Yii::t('cart/default', 'MAIL_ADMIN_SUBJECT', $this->id))
            ->send();
        return $mailer;
    }
}