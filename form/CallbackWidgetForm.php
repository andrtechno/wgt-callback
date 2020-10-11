<?php

namespace panix\ext\callback\form;

use Yii;
use panix\engine\blocks_settings\WidgetModel;

class CallbackWidgetForm extends WidgetModel
{

    public $email;


    public function rules()
    {
        return [
            [['email'], 'email'],
            [['email'], 'required'],
        ];
    }

}
