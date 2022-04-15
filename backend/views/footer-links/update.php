<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FooterLinks */

$this->title = Yii::t('app', 'Tahrirlash: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Havolalar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="footer-links-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
