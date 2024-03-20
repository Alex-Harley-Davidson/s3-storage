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

    protected $path;
    protected $fileName;

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
            $this->fileName = FileHelper::generateName(20);
            $this->path = FileHelper::getUploadPath($this->file, $this->fileName);
            $this->file->saveAs($this->path);

            return $this->path;
        } else {
            return false;
        }
    }


    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }


    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

}
