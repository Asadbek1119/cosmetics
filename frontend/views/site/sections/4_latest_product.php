<?php
/**
 * @var Product $latestProduct
 * @var Product $expensiveProduct
 * @var Product $reviewProduct
 */
    use common\models\Product;
use yii\helpers\Url;

$latestProducts = Product::find()
    ->andWhere(['status'=>Product::STATUS_ACTIVE])
    ->orderBy(['created_at' => SORT_DESC])
    ->limit(3)
    ->all();

    $expensiveProducts = Product::find()
    ->andWhere(['status'=>Product::STATUS_ACTIVE])
    ->orderBy(['price' => SORT_DESC])
    ->limit(3)
    ->all();

    $reviewProducts = Product::find()
    ->andWhere(['status'=>Product::STATUS_ACTIVE])
    ->orderBy(['created_at' => SORT_DESC])
    ->limit(3)
    ->offset(3)
    ->all();
?>
<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4><?=Yii::t('app','latestProduct');?></h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php foreach ($latestProducts as $latestProduct) : ?>
                            <a href="<?=Url::to(['shop/detail','id'=>$latestProduct->id]);?>" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?=$latestProduct->image()?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?=$latestProduct->name?></h6>
                                    <span>$<?=$latestProduct->price?></span>
                                </div>
                            </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4><?=Yii::t('app','expensiveProduct');?></h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php foreach ($expensiveProducts as $expensiveProduct) : ?>
                            <a href="<?=Url::to(['shop/detail','id'=>$expensiveProduct->id]);?>" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?=$expensiveProduct->image()?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?=$expensiveProduct->name?></h6>
                                    <span><?=$expensiveProduct->price?></span>
                                </div>
                            </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php foreach ($reviewProducts as $reviewProduct) : ?>
                            <a href="<?=Url::to(['shop/detail','id'=>$reviewProduct->id]);?>" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?=$reviewProduct->image();?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?=$reviewProduct->name?></h6>
                                    <span>$<?=$reviewProduct->price?></span>
                                </div>
                            </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->