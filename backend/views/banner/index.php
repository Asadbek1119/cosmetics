<?php

use common\models\Banner;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Banner qism');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

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

//            'id',
            [
                    'attribute' => 'image',
                    'format' => ['image',['width'=>'80px','height'=>'80px']]
            ],
            'title',
            'created_at:datetime',
            'updated_at:datetime',
            [
                    'attribute' => 'status',
                    'filter' => Banner::getStatusFilter(),
                    'value' => static function(Banner $model){
                        return $model->getStatusLabel();
                    }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end()?>

</div>
