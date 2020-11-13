<?php

namespace panix\ext\callback;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use yii\widgets\ActiveForm;

class CallbackController extends Controller
{

    public function actionIndex()
    {
        $model = new CallbackForm();
        $request = Yii::$app->getRequest();
        if ($request->isAjax) {

            if ($request->isPost && $model->load($request->post())) {

                $validator = ActiveForm::validate($model);
                if ($validator)
                    return $this->asJson($validator);
//    'SUCCESS_SEND_FORM' => 'Ваше сообщение успешно отправлено!',
                if($model->validate()){
                    $model->sendEmail();
                    return $this->asJson([
                        'message'=>Yii::t('app/default','Ваше сообщение успешно отправлено!'),
                        'success' => true
                    ]);
                }


            }
        } else {
            //throw new HttpException(403, Yii::t('app/error',403));
            throw new HttpException(403);
        }
        /*return $this->renderAjax('myViewName', [
            'model' => $model,
        ]);*/
    }
}