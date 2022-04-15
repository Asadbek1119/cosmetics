<?php

use common\models\EmailData;
use common\models\ContactData;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

/** @var EmailData $model */
/** @var \yii\web\View $this */

$this->title = 'Contact';

$contactDatas = ContactData::find()
    ->andWhere(['status' => ContactData::STATUS_ACTIVE])
    ->all();
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/template/img/hero.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= Yii::t('app','contactUs'); ?></h2>
                    <div class="breadcrumb__option">
                        <a href="/"><?= Yii::t('app', 'home'); ?></a>
                        <span><?= Yii::t('app','contactUs'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <?php foreach ($contactDatas as $contactData) : ?>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="<?= $contactData->icon; ?>"></span>
                        <h4><?= $contactData->title ?></h4>
                        <p><?= $contactData->subtitle; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.167575088991!2d71.78043161491675!3d40.38297846561628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bb83a4e74c1d51%3A0x74f191ca540db19!2siTeach%20Academy!5e0!3m2!1sen!2s!4v1641554135287!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>iTeach Academy</h4>
            <ul>
                <li><?=Yii::t('app','phone');?>: +998-88-665-77-77</li>
                <li><?=Yii::t('app','address');?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2><?=Yii::t('app','leaveMessage');?></h2>
                </div>
            </div>
        </div>
        <?php $form = ActiveForm::begin([
            'action' => Url::to(['site/contact-us'])
        ]); ?>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app','contactName')])->label(false) ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
                    'mask' => '\+\9\9\8 (99) 999-99-99',
                    'options' => [
                        'placeholder' => Yii::t('app', 'contactPhone'),
                        'minlength' => 17,
                    ]
                ])->label(false); ?>
            </div>
            <div class="col-lg-12 text-center">
                <?= $form->field($model, 'message')->textarea(['rows' => 6, 'placeholder' => Yii::t('app','contactMessage')])->label(false) ?>

                <?= Html::submitButton('SEND MESSAGE', ['class' => 'site-btn']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
<!-- Contact Form End -->