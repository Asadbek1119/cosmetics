<?php

use common\models\BlogCategory;
use common\models\FooterLinks;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\FooterLinksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Havolalar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="footer-links-index">

    <p>
        <?= Html::a("<i class='fas fa-plus'></i> ".Yii::t('app', 'Yaratish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'url:url',
            'created_at',
            [
                'attribute' => 'status',
                'filter' => FooterLinks::getStatusFilter(),
                'value' => static function(FooterLinks $model){
                    return $model->getStatusLabel();
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
