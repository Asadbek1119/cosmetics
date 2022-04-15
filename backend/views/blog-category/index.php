<?php

use common\models\BlogCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BlogCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Kategoriyalar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">
        <div class="blog-category-index">

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
                    'name',
                    [
                        'attribute' => 'status',
                        'filter' => BlogCategory::getStatusFilter(),
                        'value' => static function (BlogCategory $model) {
                            return $model->getStatusLabel();
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end()?>
        </div>
    </div>
</div>
