<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FooterLinks */

$this->title = Yii::t('app', 'Havola qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Havolalar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="footer-links-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
