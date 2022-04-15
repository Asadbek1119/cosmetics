<?php

use common\models\search\OrderItemSearch;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Buyurtmalar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-info-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
               'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model,$key,$index,$column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model,$key,$index,$column){
                    $searchModel = new OrderItemSearch();
                    $searchModel->oder_id = $model->id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_orderitems',[
                       'searchModel' => $searchModel,
                       'dataProvider' => $dataProvider,
                    ]);
                }
            ],
            'first_name',
            //'last_name',
            'address',
            'city',
            //'country',
            'postcode',
            //'phone',
            //'email:email',
            'created_at',
            ['class' => 'yii\grid\ActionColumn',
                'template'=> '{delete}'],
        ],
    ]); ?>


</div>
