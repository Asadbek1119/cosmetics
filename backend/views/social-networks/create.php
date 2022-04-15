<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SocialNetworks */

$this->title = Yii::t('app', 'Ijtimoiy tarmoqlar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ijtimoiy tarmoqlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-networks-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
