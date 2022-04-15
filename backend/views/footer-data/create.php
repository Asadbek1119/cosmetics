<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FooterData */

$this->title = Yii::t('app', 'Malumotni kiritish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Malumotlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="footer-data-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
