<?php

use common\models\BlogCategory;
use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
use mihaildev\ckeditor\CKEditor;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yeesoft\multilingual\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BlogNews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-news-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=$form->languageSwitcher($model);?>
    <?= $form->field($model, 'img')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]); ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'theme')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows'=>6]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full',
            'inline' => false,
        ],
    ]); ?>

    <?php echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'date',
        'name' => 'check_issue_date',
        'value' => date('d-M-Y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Vaqt kiriting ...'],
        'pluginOptions' => [
            'format' => 'M dd yyyy',
            'todayHighlight' => true
        ]
    ]); ?>

    <?= $form->field($model, 'button_label')->textInput() ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'type' => SwitchInput::CHECKBOX,
        'pluginOptions' => [
            'handleWidth' => 80,
            'onText' => 'FAOL',
            'offText' => 'FAOL EMAS'
        ]
    ]); ?>

    <?php $data = \yii\helpers\ArrayHelper::map(BlogCategory::find()->all(),'id','name');?>
    <?= $form->field($model, 'blog_category_id')->widget(Select2::classname(), [
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
