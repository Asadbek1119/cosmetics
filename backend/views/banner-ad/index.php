<?php

use common\models\BannerAd;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BannerAdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Banner reklama');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-ad-index">

    <p>
        <?= Html::a("<i class='fas fa-plus'></i> ".Yii::t('app', 'Yaratish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin()?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                    'attribute' => 'image',
                    'format' => ['image',['width'=>'70px','height'=>'70px']]
            ],
            'created_at',
            'updated_at',
            [
                    'attribute' => 'status',
                    'filter' => BannerAd::getStatusFilter(),
                    'value' => static function(BannerAd $model){
                        return $model->getStatusLabel();
                    }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end()?>

</div>
