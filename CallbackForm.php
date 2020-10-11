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
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Ваше имя',
            'phone' => 'Номер телефона'
        ];
    }
}