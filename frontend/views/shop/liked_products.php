<?php
/**
 * @var Product $products
 * @var Product $pagination
 */

use common\models\Product;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../template/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= Yii::t('app', 'likedProducts') ?></h2>
                    <div class="breadcrumb__option">
                        <a href="/"><?= Yii::t('app', 'home') ?></a>
                        <span><?= Yii::t('app', 'likedProducts') ?></span>
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
                <div class="shoping__cart__table liked_products">

                    <?= $this->render('_liked', [
                        'products' => $products,
                        'pagination' => $pagination
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->