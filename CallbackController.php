<?php

namespace panix\ext\callback;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use yii\widgets\ActiveForm;

class CallbackController extends Controller
{

    /**
     * @return \yii\web\Response
     * @throws HttpException
     */
    public function actionIndex()
    {
        $widget = new CallbackWidget();

        $model = new CallbackForm();
        $request = Yii::$app->getRequest();
        if ($request->isAjax) {

            if ($request->isPost && $model->load($request->post())) {

                $validator = ActiveForm::validate($model);
                if ($validator)
                    return $this->asJson($validator);
                if ($model->validate()) {
                    $model->sendEmail();
                    return $this->asJson([
                        'message' => $widget::t('default', 'SEND_SUCCESS'),
                        'success' => true
                    ]);
                }


            }
        } else {
            //throw new HttpException(403, Yii::t('app/error',403));
            throw new HttpException(403);
        }
    }
}