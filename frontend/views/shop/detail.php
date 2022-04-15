<?php

/**
 * @var Product $product
 * @var Product $similarProduct
 * @var SocialNetworks $socialNetwork 
 */

use common\models\Product;
use common\models\SocialNetworks;
use yii\helpers\Url;

$this->title = $product->name;
$similarProducts = Product::find()
    ->andWhere(['status' => Product::STATUS_ACTIVE, 'product_category_id' => $product->product_category_id])
    ->andWhere(['!=', 'id', $product->id])
    ->limit(4)
    ->orderBy(['created_at' => SORT_DESC])
    ->all();

$socialNetworks = SocialNetworks::find()->andWhere(['status' => SocialNetworks::STATUS_ACTIVE])->all();
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../template/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= $product->name ?></h2>
                    <div class="breadcrumb__option">
                        <a href="/"><?= Yii::t('app', 'home'); ?></a>
                        <a href="<?= Url::to(['shop/index', 'id' => $product->product_category_id]) ?>">
                            <?= $product->productCategory->name ?>
                        </a>
                        <span><?= $product->name ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                             src="<?php echo $product->image()?>" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <?php foreach ($product->images() as $image): ?>
                            <img data-imgbigurl="<?= $image ?>"
                                 src="<?= $image ?>" alt="">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $product->name ?></h3>
                    <div class='product__details__price'>$
                        <?php if ($product->discount_status == true)
                            echo $product->old_price - ($product->old_price / 100 * $product->discount_value);
                        else
                            echo $product->price;
                        ?>
                    </div>


                    <p><?= $product->description ?></p>
                    <a href="<?= Url::to(['cart/add-to-cart', 'id' => $product->id]) ?>"
                       class="primary-btn add-to-cart">ADD TO CARD</a>
                    <a href="<?= Url::to(['liked/add-to-liked', 'id' => $product->id]) ?>"
                       class="heart-icon add-to-liked"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span><?= $product->availability; ?></span></li>
                        <li><b>Shipping</b> <span><?= $product->shipping ?></span></li>
                        <li><b>Weight</b> <span><?= $product->weight ?></span></li>
                        <li><b><?= Yii::t('app', 'shareOn') ?></b>
                            <div class="share">
                                <?php foreach ($socialNetworks as $socialNetwork) : ?>
                                    <a href="<?= $socialNetwork->network_url ?>"><i
                                                class="<?= $socialNetwork->network_icon ?>"></i></a>
                                <?php endforeach; ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#" role="tab"
                               aria-selected="false"><?= Yii::t('app', 'information') ?></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6><?= Yii::t('app', 'productInfo') ?></h6>
                                <p><?= $product->information ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2><?= Yii::t('app', 'relatedProducts') ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($similarProducts as $similarProduct) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?= $similarProduct->image() ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>
                                <a href="<?= Url::to(['shop/detail', 'id' => $product->id]); ?>"><?= $similarProduct->name ?></a>
                            </h6>
                            <h5>$<?= $similarProduct->price ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Related Product Section End -->