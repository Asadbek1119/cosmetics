<?php

use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FooterBusiness */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="footer-business-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->languageSwitcher($model); ?>
    <?= $form->field($model, 'week_days')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_hours')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'type' => SwitchInput::CHECKBOX,
        'pluginOptions' => [
            'handleWidth' => 80,
            'onText' => 'FAOL',
            'offText' => 'FAOL EMAS'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
