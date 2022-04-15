<?php

use common\models\EmailData;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\EmailDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Forma malumotlari');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-data-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'contentOptions' => static function (EmailData $model) {
                    if ($model->status === EmailData::STATUS_VIEWED)
                        return ['style' => 'background:lightgreen'];

                    return ['style' => 'background:#ff726f'];
                }
            ],

            //'id',
            'name',
            'phone',
            'message:ntext',
            'created_at',
            [
                'attribute' => 'status',
                'filter' => EmailData::getStatusFilter(),
                'value' => static function (EmailData $model) {
                    return $model->getStatusLabel();
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'buttons' =>
                    [
                        'view' => function ($url, $model, $key) {
                            return Html::a('<i class="fas fa-eye"></i>', $url);
                        }
                    ]
            ],
        ],
    ]); ?>


</div>
