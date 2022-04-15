<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FooterData */

$this->title = Yii::t('app', 'Tahrirlash: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Malumotlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="footer-data-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
