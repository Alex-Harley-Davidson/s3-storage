<?php

namespace frontend\helpers;

use Yii;
use yii\web\UploadedFile;

class FileHelper
{
    /**
     * @param UploadedFile|null $file
     * @return string
     */
    public static function getUploadPath(UploadedFile $file = null): string
    {
        $path = Yii::getAlias("@frontend/web/upload");

        if (!is_dir($path)) {
            mkdir($path, 0755);
        }

        if ($file) {
            $path .= DIRECTORY_SEPARATOR . self::generateName(20) . '.' . $file->extension;
        }

        return $path;
    }

    public static function generateName($length = 32): string
    {
        return time() . "_" . Yii::$app->security->generateRandomString($length);
    }

}