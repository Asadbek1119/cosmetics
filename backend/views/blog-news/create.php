<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BlogNews */

$this->title = Yii::t('app', 'Yangiliklar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yangiliklar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-news-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
