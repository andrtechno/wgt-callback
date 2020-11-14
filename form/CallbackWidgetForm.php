<?php

namespace panix\ext\callback\form;

use panix\engine\CMS;
use Yii;
use panix\engine\blocks_settings\WidgetModel;
use yii\validators\EmailValidator;

class CallbackWidgetForm extends WidgetModel
{

    public $email;


    public function rules()
    {
        return [
            [['email'], '\panix\engine\validators\EmailListValidator'],
            [['email'], 'required'],
        ];
    }

}
