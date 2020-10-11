<?php

namespace panix\ext\callback;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;

class CallbackController extends Controller
{

    public function actionIndex()
    {
        $model = new CallbackForm();
        $request = Yii::$app->getRequest();
        if ($request->isAjax) {
            if ($request->isPost && $model->load($request->post())) {
                // \Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->asJson(['success' => 'success']);
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