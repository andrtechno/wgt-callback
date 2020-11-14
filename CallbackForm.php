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
            'username' => Yii::t('wgt_CallbackWidget/default', 'USERNAME'),
            'phone' => Yii::t('wgt_CallbackWidget/default', 'PHONE')
        ];
    }

    public function sendEmail()
    {
        if (Yii::$app->settings->get('wgt_CallbackWidget', 'email')) {
            $email = explode(',',Yii::$app->settings->get('wgt_CallbackWidget', 'email'));
        } else {
            $email = Yii::$app->settings->get('app', 'email');
        }

        $mailer = Yii::$app->mailer;
        $mailer->htmlLayout = '@app/mail/layouts/html';
        $mailer->compose(['html' => '@vendor/panix/wgt-callback/mail/mail.tpl'], ['model' => $this])
            ->setFrom(['noreply@' . Yii::$app->request->serverName => Yii::$app->name . ' robot'])
            ->setTo($email)
            ->setSubject(Yii::t('wgt_CallbackWidget/default', 'SUBJECT'))
            ->send();
        return $mailer;
    }
}