<?php

namespace app\modules\intervyu;

use Yii;

/**
 * intervyu module definition class
 */
class IntervyuModule extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\intervyu\controllers';
    //public $defaultRoute = 'main';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        \Yii::configure($this, require __DIR__ . '/config/web.php');
        // custom initialization code goes here
    }
}
