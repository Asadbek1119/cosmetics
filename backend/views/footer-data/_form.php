<?php

use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\FooterData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="footer-data-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->languageSwitcher($model); ?>

    <?= $form->field($model, 'address')->textInput() ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
        'mask' => '\+\9\9\8 (99) 999-99-99',
        'options' => [
            'placeholder' => Yii::t('app', '+998 (__) ___-__-__'),
            'minlength' => 17,
        ]
    ]); ?>

    <?= $form->field($model, 'email')->textInput() ?>

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
