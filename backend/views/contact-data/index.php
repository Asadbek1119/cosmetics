<?php

use common\models\BlogCategory;
use common\models\ContactData;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ContactDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Kontakt malumotlari');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-data-index">

    <p>
        <?= Html::a("<i class='fas fa-plus'></i> ".Yii::t('app', 'Qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'icon',
            'title',
            'subtitle',
            [
                    'attribute' => 'status',
                    'filter' => ContactData::getStatusFilter(),
                    'value' => static function(ContactData $model){
                        return $model->getStatusLabel();
                    }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
