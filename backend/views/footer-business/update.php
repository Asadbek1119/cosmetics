<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FooterBusiness */

$this->title = Yii::t('app', 'Tahrirlash: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ish vaqtlari'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="footer-business-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
