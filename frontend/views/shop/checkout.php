<?php
/**
 * @var \common\models\OrderInfo $model
 * @var \common\models\Product $products
 */

use frontend\components\Cart;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$this->title = 'Check Out'
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../template/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= Yii::t('app', 'checkout'); ?></h2>
                    <div class="breadcrumb__option">
                        <a href="/"><?= Yii::t('app', 'home'); ?></a>
                        <span><?= Yii::t('app', 'checkout'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4><?= Yii::t('app', 'billingDetails'); ?></h4>
            <?php $form = ActiveForm::begin([
                'action' => Url::to(['shop/check-out'])
            ]) ?>
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <?= $form->field($model, 'first_name')->textInput() ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <?= $form->field($model, 'last_name')->textInput() ?>
                            </div>
                        </div>
                    </div>
                    <div class="checkout__input">
                        <?= $form->field($model, 'address')->textInput() ?>
                    </div>
                    <div class="checkout__input">
                        <?= $form->field($model, 'city')->textInput() ?>
                    </div>
                    <div class="checkout__input">
                        <?= $form->field($model, 'country')->textInput() ?>
                    </div>
                    <div class="checkout__input">
                        <?= $form->field($model, 'postcode')->textInput() ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <?= $form->field($model, 'phone')->textInput() ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <?= $form->field($model, 'email')->textInput() ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="checkout__order">
                        <h4><?= Yii::t('app', 'yourOrder') ?></h4>
                        <div class="checkout__order__products"><?= Yii::t('app', 'totalProducts') ?></div>
                        <ul>
                            <?php foreach ($products as $product) : ?>
                                <li><?= $product->name ?>
                                    <span>$<?= $product->priceCount() * Cart::getProductCount($product->id) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php $totalPrice = Cart::getTotalPrice() ?>
                        <div class="checkout__order__subtotal"><?= Yii::t('app', 'subTotal'); ?>
                            <span>$<?= $totalPrice ?></span></div>
                        <div class="checkout__order__total"><?= Yii::t('app', 'total'); ?>
                            <span>$<?= $totalPrice ?></span></div>

                        <?= Html::submitButton(Yii::t('app', 'placeOrder'), ['class' => 'site-btn'])?>

                    </div>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</section>
<!-- Checkout Section End -->