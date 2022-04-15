<?php
/**
 * @var Product $products
 * @var Product $pagination
 */

use common\models\Product;
use frontend\components\Cart;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = 'Cart'
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/template/img/breadcrump.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= Yii::t('app', 'shoppingCart') ?></h2>
                    <div class="breadcrumb__option">
                        <a href="/"><?= Yii::t('app', 'home') ?></a>
                        <span><?= Yii::t('app', 'shoppingCart') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <?= $this->render('_cart', [
                        'products' => $products,
                        'pagination' => $pagination,
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div id="totalajaxcall" class="col-lg-6 offset-3">
                <div class="shoping__checkout totalpricingload">
                    <h5><?= Yii::t('app', 'cartTotal') ?></h5>
                    <ul>
                        <li><?= Yii::t('app', 'subTotal') ?>
                            <?php $totalPrice = Cart::getTotalPrice() ?>
                            <span>$<?= $totalPrice ?></span></li>

                        <li><?= Yii::t('app', 'total') ?> <span>$<?= $totalPrice ?></span></li>
                    </ul>
                    <?php
                    if (Yii::$app->user->isGuest) : ?>
                        <a href="<?= Url::to(['site/login']) ?>"
                           class="primary-btn"><?= Yii::t('app', 'toCheckout') ?></a>
                    <?php else: ?>
                        <a href="<?= Url::to(['shop/check-out']) ?>"
                           class="primary-btn"><?= Yii::t('app', 'toCheckout') ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->