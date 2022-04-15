<?php
    use common\models\ProductCategory;
use yii\helpers\Url;

$productCategories = ProductCategory::find()
    ->andWhere(['status' => ProductCategory::STATUS_ACTIVE])
    ->all();
?>

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php foreach ($productCategories as $productCategory) : ?>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="<?=$productCategory->image;?>">
                        <h5><a href="<?= Url::to(['shop/index','id'=>$productCategory->id])?>"><?=$productCategory->name;?></a></h5>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->