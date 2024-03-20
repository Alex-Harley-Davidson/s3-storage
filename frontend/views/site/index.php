<?php

use yii\bootstrap5\ActiveForm;
use frontend\models\FileUploadForm;

/**
 * @var yii\web\View $this
 * @var FileUploadForm $fileUploadForm
 */

$this->title = 'S3 storage';
$session = Yii::$app->session;

?>

<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Сервис для загрузки файлов</h1>
            <p class="fs-5 fw-light">Выберете файл для загрузки</p>
            <div>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                <?= $form->field($fileUploadForm, 'file')->fileInput() ?>

                <button class="btn btn-success">Отправить</button>

                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <?php if ($session->hasFlash('successfulDownload')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= $session->getFlash('successfulDownload'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($session->hasFlash('failedDownload')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $session->getFlash('failedDownload'); ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>
</div>
