<?php

namespace frontend\models;

use frontend\helpers\FileHelper;
use Yii;
use yii\base\Model;

/**
 * FileUploadForm is the model behind the file upload form.
 */
class FileUploadForm extends Model
{
    public $file;
    public $path;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            ['file', 'required', 'message' => 'Файл не выбран'],
            ['file', 'file', 'extensions' => 'pdf'],
        ];
    }


    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'file' => 'Файл',
        ];
    }

    /**
     * @return string|false
     */
    public function upload(): string|false
    {
        if ($this->validate()) {
            $path = FileHelper::getUploadPath($this->file);
            $this->file->saveAs($path);
            return true;
        } else {
            return false;
        }
    }

}
