<?php

use common\models\SocialNetworks;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SocialNetworks */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ijtimoiy tarmoqlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="social-networks-view">

    <p>
        <?= Html::a("<i class='fas fa-pencil-alt'></i> ".Yii::t('app', 'Tahrirlash'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a("<i class='fas fa-trash-alt'></i> ".Yii::t('app', 'O\'chirish'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Haqiqatan ham bu elementni oʻchirib tashlamoqchimisiz?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'network_url:url',
            'network_icon',
            'statusLabel',
        ],
    ]) ?>

</div>
