<?php

/**
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 */

namespace panix\ext\callback;

use panix\engine\data\Widget;

/**
 * Class CallbackWidget
 * @package panix\ext\callback
 */
class CallbackWidget extends Widget
{

    static $widget_name = 'Callback widget';
    static $widget_description = 'Callback desctipyion';

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

    public function __construct(array $config = [])
    {
        self::$widget_name = 'Call back';
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $model = new CallbackForm;
        return $this->render($this->skin,['model'=>$model]);
    }

}
