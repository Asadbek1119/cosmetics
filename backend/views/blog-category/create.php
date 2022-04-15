<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BlogCategory */

$this->title = Yii::t('app', 'Kategoriya qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategoriya'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="blog-category-create">
    <div class="card">
        <div class="card-body">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        </div>
    </div>
</div>
