<?php

require(__DIR__ . '/../yiisoft/yii2/BaseYii.php');
require(__DIR__ . '/globals.php');
defined('UP_PATH') or define('UP_PATH', realpath(dirname(__FILE__)));

class Yii extends \yii\BaseYii {

    /**
     * Adds custom classes into autoload array.
     * @param array class name => path to file
     */
    public static function addCustomClasses($classes) {
        Yii::$classMap = array_merge(Yii::$classMap, $classes);
    }

    public static function getUniprogyVersion() {
        return '2.0.0-dev';
    }

}

spl_autoload_register(['Yii', 'autoload'], true, true);
Yii::$classMap = yii\helpers\ArrayHelper::merge(
                include(YII_PATH . '/classes.php'), include(UP_PATH . '/classes.php')
);
Yii::$container = new yii\di\Container;
