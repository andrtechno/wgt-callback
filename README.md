Widget callback
===========

[![Latest Stable Version](https://poser.pugx.org/panix/wgt-callback/v/stable)](https://packagist.org/packages/panix/wgt-callback)
[![Total Downloads](https://poser.pugx.org/panix/wgt-callback/downloads)](https://packagist.org/packages/panix/wgt-callback)
[![Monthly Downloads](https://poser.pugx.org/panix/wgt-callback/d/monthly)](https://packagist.org/packages/panix/wgt-callback)
[![Daily Downloads](https://poser.pugx.org/panix/wgt-callback/d/daily)](https://packagist.org/packages/panix/wgt-callback)
[![Latest Unstable Version](https://poser.pugx.org/panix/wgt-callback/v/unstable)](https://packagist.org/packages/panix/wgt-callback)
[![License](https://poser.pugx.org/panix/wgt-callback/license)](https://packagist.org/packages/panix/wgt-callback)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer require --prefer-dist panix/wgt-callback "*"
```

or add

```
"panix/wgt-callback": "*"
```

to the require section of your `composer.json` file.


Usage
-----
add you config.php
```
'controllerMap' => [
    'callback' => 'panix\ext\callback\CallbackController',
],
```

add you view file

[See modal options](https://www.yiiframework.com/extension/yiisoft/yii2-bootstrap4/doc/api/2.0/yii-bootstrap4-modal).

```
echo \panix\ext\callback\CallbackWidget::widget([
    'id' => 'callback-modal',
    'size' => 'modal-dialog-centered modal-dialog-scrollable',
    'toggleButton' => false,
    // modal options
]);
```

Add you UrlManager rules
```
'rules' => [
    'callback' => 'callback/index',
    // ..
]
```