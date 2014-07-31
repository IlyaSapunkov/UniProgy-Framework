<?php

defined('DS') or define('DS', DIRECTORY_SEPARATOR);

/**
 * This is the shortcut to Yii::$app
 */
function app() {
    return Yii::$app;
}

function asma() {
    return Yii::$app->getAssetManager();
}

/**
 * This is the shortcut to Yii::$app->user.
 */
function user() {
    return Yii::$app->getUser();
}

/**
 * This is the shortcut to Yii::$app->getAuthManager().
 */
function auth() {
    return Yii::$app->getAuthManager();
}

/**
 * This is the shortcut to Yii::$app->getRequest().
 */
function request() {
    return app()->getRequest();
}
/**
 * This is the shortcut to Yii::$app->createUrl()
 */
function url($route, $params = array(), $schema = '', $ampersand = '&') {
    $u = Yii::$app->urlManager->createUrl($route, $params, $schema, $ampersand);
    return $u ? $u : aUrl('/');
}

/**
 * This is the shortcut to Yii::$app->urlManager()->createAbsoluteUrl()
 */
function aUrl($route, $params = array(), $schema = '', $ampersand = '&') {
    return Yii::$app->urlManager->createAbsoluteUrl($route, $params, $schema, $ampersand);
}

/**
 * This is the shortcut to Html::encode
 */
function h($text) {
    return htmlspecialchars($text, ENT_QUOTES, Yii::$app->charset);
}

/**
 * This is the shortcut to Html::a()
 */
function l($text, $url = '#', $htmlOptions = array()) {
    return yii\helpers\Html::a($text, $url, $htmlOptions);
}

/**
 * This is the shortcut to Yii::t() with default category = 'uniprogy'
 */
function t($message, $module = null, $params = array(), $source = null, $language = null) {
    if ($module === 'yii')
        $category = $module;
    else
        $category = $module === null ? 'uniprogy' : $module;
    return Yii::t($category, $message, $params, $source, $language);
}

/**
 * This is the shortcut to Yii::$app->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function bu($url = null) {
    static $baseUrl;
    if ($baseUrl === null){
        $baseUrl = request()->getBaseUrl();
    }
    return $url === null ? $baseUrl : $baseUrl . '/' . ltrim($url, '/');
}

/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::$app->params[$name].
 */
function param($name) {
    return isset(app()->params[$name]) ? app()->params[$name] : null;
}

/**
 * This is the shortcut to Yii::$app->getModel()
 */
function m($moduleName) {
    return app()->getModule($moduleName);
}

function w(){
    return ;
}
/**
 * This is the shortcut to Yii::$app->workletManager
 */
function wm() {
    return app()->workletManager;
}

/**
 * This is the shortcut to Yii::app()->getLocale()->getTextFormatter()
 */
function txt() {
    return app()->textFormatter;
}

/**
 * Applies user GMT difference to the timestamp.
 * @param integer source timestamp
 * @param whether to apply GMT difference or un-apply
 * @return integer timestamp
 */
function utime($value, $apply = true) {
    $userTZ = user()->isGuest ? param('timeZone') : user()->modelData('timeZone');
    return UTimestamp::applyGMT($value, $userTZ, $apply);
}
