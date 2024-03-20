<?php

namespace frontend\helpers;

use Yii;
use yii\web\UploadedFile;

class FileHelper
{
    /**
     * @param UploadedFile|null $file
     * @param string|null $name
     * @return string
     */
    public static function getUploadPath(UploadedFile $file = null, $name = null): string
    {
        $path = Yii::getAlias("@frontend/web/upload");

        if (!is_dir($path)) {
            mkdir($path, 0755);
        }

        if (!$name) {
            $name = self::generateName(20);
        }

        if ($file) {
            $path .= DIRECTORY_SEPARATOR . $name . '.' . $file->extension;
        }

        return $path;
    }

    public static function generateName($length = 32): string
    {
        return time() . "_" . Yii::$app->security->generateRandomString($length);
    }

    /**
     * @param string $filename
     * @param string $mode
     * @return mixed
     */
    public static function open( string $filename, string $mode): mixed
    {
        return fopen($filename, $mode);
    }

}