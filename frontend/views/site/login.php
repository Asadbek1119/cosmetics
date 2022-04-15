<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

$this->title = 'TIZIMGA KIRISH';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="bg"></div>
<div class="container container-signin">
    <div class="left-signin"></div>
    <div class="right-signin">
        <div class="formBox-signin">
            <h4 class="text-center font-weight-bold"><?= Html::encode($this->title) ?></h4>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'phone',['labelOptions' => ['class' => 'form-text']
            ])->widget(MaskedInput::class, [
                'mask' => '\+\9\9\8 (99) 999-99-99',
                'options' => [
                    'class' => 'form-input',
                    'placeholder' => Yii::t('app', 'contactPhone'),
                    'minlength' => 17,
                ]
            ])->label(false); ?>

            <?= $form->field($model, 'password',['labelOptions' => [ 'class' => 'form-text']
            ])->passwordInput(['class'=>'form-input','placeholder'=>'Parolingizni kiriting...'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Kirish', ['class' => 'sign-in mb-1', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
            <a href="<?= Url::to(['/site/signup'])?>"><h6 class="text-center">Ro'yxatdan o'tish</h6></a>
        </div>
    </div>
</div>