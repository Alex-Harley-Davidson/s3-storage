<?php

namespace frontend\helpers;

use Yii;
use yii\bootstrap5\Html;

class FlashHelper
{

    /**
     * @param $key
     * @param $message
     * @return void
     */
    public static function setMessage($key, $message): void
    {
        Yii::$app->session->setFlash($key, $message);
    }

    /**
     * @param $key
     * @param $message
     * @param $link
     * @param $linkText
     * @return void
     */
    public static function setMessageWithLink($key, $message, $link, $linkText = null): void
    {
        $linkText = $linkText ?? $link;
        $message .= " " . Html::a($linkText, $link, ['class' => 'alert-link']);

        Yii::$app->session->setFlash($key, $message);
    }
}