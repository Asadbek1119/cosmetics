<?php
/**
 * @var Product $latestProduct
 * @var Product $products
 * @var Product $pagination
 * @var ProductCategory $productCategory
 * @var Product $discountProduct
 */

use common\models\Product;
use common\models\ProductCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$productCategories = ProductCategory::find()
    ->andWhere(['status' => ProductCategory::STATUS_ACTIVE])
    ->all();

// latest products
$latestProducts = Product::find()
    ->andWhere(['status' => Product::STATUS_ACTIVE])
    ->orderBy(['created_at' => SORT_DESC])
    ->limit(3)
    ->all();
$latestProductsSeconds = Product::find()
    ->andWhere(['status' => Product::STATUS_ACTIVE])
    ->orderBy(['created_at' => SORT_DESC])
    ->limit(3)
    ->offset(3)
    ->all();

//discount products
$discountProducts = Product::find()
    ->andWhere(['status' => Product::STATUS_ACTIVE, 'discount_status' => Product::DISCOUNT_ACTIVE])
    ->orderBy(['created_at' => SORT_DESC])
    ->limit(6)
    ->all();


$id = Yii::$app->request->get('id');
$category = ProductCategory::findOne(['id' => $id]);

$this->title = $category->name ?? 'Shop';
?>

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">

                    <div class="sidebar__item">
                        <a href="<?=Url::to(['shop/index'])?>"><h4 style="color: black"><?= Yii::t('app', 'allDepartment'); ?></h4></a>
                        <ul>
                            <?php foreach ($productCategories as $productCategory) : ?>
                                <li>
                                    <a href="<?= Url::to(['shop/index', 'id' => $productCategory->id]) ?>"><?= $productCategory->name; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <?php foreach ($latestProducts as $latestProduct) : ?>
                                        <a href="<?= Url::to(['shop/detail', 'id' => $latestProduct->id]) ?>"
                                           class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?= $latestProduct->image(); ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?= $latestProduct->name; ?></h6>
                                                <span><?= $latestProduct->price; ?></span>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>

                                <div class="latest-prdouct__slider__item">
                                    <?php foreach ($latestProductsSeconds as $latestProductSecond) : ?>
                                        <a href="<?= Url::to(['shop/detail', 'id' => $latestProductSecond->id]) ?>"
                                           class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?= $latestProductSecond->image(); ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?= $latestProductSecond->name; ?></h6>
                                                <span>$<?= $latestProductSecond->price; ?></span>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="section-title product__discount__title text-center">
                    <h2><?= Yii::t('app', 'allProducts') ?></h2>
                </div>
                <div class="filter__item mb-2">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span><?= Yii::t('app', 'allProducts') ?></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6>
                                    <span><?php echo Product::find()->count(); ?></span> <?= Yii::t('app', 'productFound') ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($products as $product) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?= $product->image() ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="<?=Url::to(['liked/add-to-liked','id'=>$product->id])?>"
                                               class="add-to-liked"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="<?= Url::to(['cart/add-to-cart', 'id' => $product->id]) ?>"
                                               class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>
                                        <a href="<?= Url::to(['shop/detail', 'id' => $product->id]) ?>"><?= $product->name ?></a>
                                    </h6>
                                    <h5><?= $product->price ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="product__pagination">
                    <?php
                    echo LinkPager::widget([
                        'pagination' => $pagination
                    ])
                    ?>
                </div>
                <div class="product__discount mt-5">
                    <div class="section-title product__discount__title">
                        <h2><?= Yii::t('app', 'discountProduct') ?></h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <?php foreach ($discountProducts as $discountProduct) : ?>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                             data-setbg="<?= $discountProduct->image() ?>">
                                            <div class="product__discount__percent">
                                                -<?= $discountProduct->discount_value ?>%
                                            </div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="<?= Url::to(['liked/add-to-liked','id'=>$product->id])?>"
                                                       class="add-to-liked"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="<?= Url::to(['cart/add-to-cart', 'id' => $discountProduct->id]) ?>"
                                                       class="add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <?php $categoryNames = ArrayHelper::map(ProductCategory::find()->where(['id' => $discountProduct->product_category_id])->all(), 'id', 'name') ?>
                                            <?php foreach ($categoryNames as $categoryName) : ?>
                                                <span><?= $categoryName; ?></span>
                                            <?php endforeach; ?>
                                            <h5>
                                                <a href="<?= Url::to(['shop/detail', 'id' => $discountProduct->id]); ?>"><?= $discountProduct->name; ?></a>
                                            </h5>
                                            <div class="product__item__price">
                                                <?= $discountProduct->old_price - ($discountProduct->old_price / 100 * $discountProduct->discount_value); ?>
                                                <span><?= $discountProduct->old_price; ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->