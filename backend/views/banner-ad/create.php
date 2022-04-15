<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BannerAd */

$this->title = Yii::t('app', 'Reklama qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Banner reklama'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-ad-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
