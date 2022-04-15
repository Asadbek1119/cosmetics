<?php

use common\models\ProductCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProductCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mahsulot Kategoriyalari');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-index">

    <p>
        <?= Html::a("<i class='fas fa-plus'></i> ".Yii::t('app', 'Yaratish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            [
                'attribute' => 'image',
                'format' => ['image', ['width' => '60px', 'height' => '60px']]
            ],
            [
                'attribute' => 'status',
                'filter' => ProductCategory::getStatusFilter(),
                'value' => static function(ProductCategory $model){
                    return $model->getStatusLabel();
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
