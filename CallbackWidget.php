<?php

/**
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 */

namespace panix\ext\callback;

use yii\web\View;
use yii\helpers\Json;
use yii\base\Widget;

/**
 * Class CallbackWidget
 * @package panix\ext\callback
 */
class CallbackWidget extends Widget
{

    public $options = [];
    public $skin = 'default';
    public $id;
    public $title;
    public $titleOptions = [];
    public $headerOptions = [];
    public $bodyOptions = [];
    public $footer;
    public $footerOptions = [];
    public $size;
    public $closeButton = [];
    public $toggleButton = false;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $model = new CallbackForm;
        $view = $this->getView();
        return $this->render($this->skin,['model'=>$model]);
    }

}
