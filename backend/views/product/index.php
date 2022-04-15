<?php

use common\models\Product;
use common\models\ProductCategory;
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mahsulotlar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <p>
        <?= Html::a("<i class='fas fa-plus'></i> " . Yii::t('app', 'Yaratish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'pager' => ['class' => LinkPager::class],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'price',
            [
                'attribute' => 'discount_status',
                'filter' => Product::getDiscountStatusFilter(),
                'value' => static function (Product $model) {
                    return $model->getDiscountStatusLabel();
                }
            ],
            //'old_price',
            [
                'label' => 'Kategoriya tanlang...',
                'attribute' => 'product_category_id',
                'filter' => ProductCategory::categories(),
                'value' => static function (Product $model) {
                    return $model->productCategory->name;
                }
            ],
            'created_at:datetime',
            //'updated_at',
            //'status',

            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} {img}',
                'buttons' => [
                    'img' => function ($url, $model) {
                        return Html::a('<i class="fas fa-image"></i>', ['product/img', 'id' => $model->id], [
                            'title' => "Rasm yuklash",
                            'data-pjax' => "0",
                            'data' => [
                                'confirm' => 'Rasm yuklamoqchimisiz?',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
