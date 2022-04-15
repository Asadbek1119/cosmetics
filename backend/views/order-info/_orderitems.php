<?php

use common\models\OrderItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\OrderItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Buyurtmalar');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-item-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'product.name',
                'label' => 'Product Name',
            ],
            [
                'attribute' => 'price',
                'label' => 'Price',
            ],
            'count',
            [
                'attribute' => 'sum',
                'label' => 'Total Sum',
                'pageSummary' => true,
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
