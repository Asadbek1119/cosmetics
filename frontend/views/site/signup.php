<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

$this->title = 'RO\'YHATDAN O\'TISH';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bg"></div>
<div class="container container-signup">
    <div class="left-signup"></div>
    <div class="right-signup">
        <div class="formBox-signup">
            <h4 class="text-center font-weight-bold"><?= Html::encode($this->title) ?></h4>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username', ['labelOptions' => ['class' => 'form-text']
            ])->textInput(['autofocus' => true, 'class' => 'form-input', 'placeholder' => 'Ismingizni kiriting...'])->label(false) ?>

            <?= $form->field($model, 'phone',['labelOptions' => ['class' => 'form-text']
            ])->widget(MaskedInput::class, [
                'mask' => '\+\9\9\8 (99) 999-99-99',
                'options' => [
                    'class' => 'form-input',
                    'placeholder' => Yii::t('app', 'contactPhone'),
                    'minlength' => 17,
                ]
            ])->label(false); ?>

            <?= $form->field($model, 'password', ['labelOptions' => ['class' => 'form-text']
            ])->passwordInput(['class' => 'form-input', 'placeholder' => 'Parolingizni kiriting...'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Ro\'yhatdan o\'tish', ['class' => 'sign-in', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
            <a href="<?= Url::to(['site/login']) ?>"><h6 class="text-center">Sizda allaqachon hisob bormi?</h6></a>
        </div>
    </div>
</div>