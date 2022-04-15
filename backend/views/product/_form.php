<?php

use common\models\ProductCategory;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use zxbodya\yii2\galleryManager\GalleryManager;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=$form->languageSwitcher($model);?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'availability')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shipping')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'information')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full',
            'inline' => false,
        ],
    ]); ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'type' => SwitchInput::CHECKBOX,
        'pluginOptions' => [
            'handleWidth' => 80,
            'onText' => 'FAOL',
            'offText' => 'FAOL EMAS'
        ]
    ]); ?>

    <?= $form->field($model, 'discount_value')->textInput() ?>

    <?= $form->field($model, 'discount_status')->radioList([
        1 => 'Chegirmali',
        0 => 'Chegirmasiz'
    ]) ?>

    <?php $data = yii\helpers\ArrayHelper::map(ProductCategory::find()->all(),'id','name')?>
    <?= $form->field($model, 'product_category_id')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Kategoriya tanlang...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
