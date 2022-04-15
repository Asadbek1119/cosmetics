<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FooterBusiness */

$this->title = Yii::t('app', 'Ish vaqtlari');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ish vaqtlari'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="footer-business-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
