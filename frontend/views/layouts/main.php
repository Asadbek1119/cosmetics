<?php

/* @var $this View */

/* @var $content string */


use diecoding\toastr\ToastrFlash;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <?php
    ToastrFlash::widget();

    // custom
    ToastrFlash::widget([
        "hideDuration" => 'custom value',
        "timeOut" => 'custom value',
        "extendedTimeOut" => 'custom value',
        "showEasing" => 'custom value',
        "hideEasing" => 'custom value',
        "showMethod" => 'custom value',
        "hideMethod" => 'custom value',
        "tapToDismiss" => 'custom value',
    ]);

    ?>
    <body>
    <?php $this->beginBody() ?>
    <?= $this->render('_preLoader'); ?>
    <?= $this->render('header/_index'); ?>
    <?= $content ?>
    <?= $this->render('_footer'); ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
