<?php

use common\models\ProductCategory;
use yii\helpers\Url;

/** @var ProductCategory $productCategories */

$productCategories = ProductCategory::find()
    ->andWhere(['status' => ProductCategory::STATUS_ACTIVE])
    ->all();
?>
<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2><?= Yii::t('app', 'featuredProduct'); ?></h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*"><?= Yii::t('app', 'all') ?></li>
                        <?php foreach ($productCategories as $productCategory) : ?>
                            <li data-filter=".cat_<?= $productCategory->id; ?>"><?= $productCategory->name; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php foreach ($productCategories as $productCategory) : ?>
                <?php foreach ($productCategory->products as $product) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix cat_<?= $productCategory->id ?>">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="<?= $product->image() ?>">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="<?=Url::to(['liked/add-to-liked','id'=>$product->id])?>"
                                           class="add-to-liked"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="<?= Url::to(['cart/add-to-cart', 'id' => $product->id]) ?>"
                                           class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6>
                                    <a href="<?= Url::to(['shop/detail', 'id' => $product->id]); ?>"><?= $product->name ?></a>
                                </h6>
                                <h5><?= $product->price; ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->