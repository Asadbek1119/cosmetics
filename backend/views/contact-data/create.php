<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContactData */

$this->title = Yii::t('app', 'Kontakt malumotlari');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kontakt malumotlari'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-data-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
