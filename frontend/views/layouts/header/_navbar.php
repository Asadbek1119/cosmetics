<?php
use yii\helpers\Url;
use common\models\ProductCategory;

$indexUrl = Yii::$app->controller->route == 'site/index';
$productCategories = ProductCategory::find()
    ->andWhere(['status' => ProductCategory::STATUS_ACTIVE])
    ->all();
?>
<!-- Hero Section Begin -->
<section class="hero <?= $indexUrl == true ? ' ' : 'hero-normal'?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span><?=Yii::t('app','allDepartment');?></span>
                    </div>
                    <ul>
                        <?php foreach ($productCategories as $productCategory) : ?>
                        <li><a href="<?= Url::to(['shop/index','id'=>$productCategory->id])?>"><?=$productCategory->name;?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="<?=Url::to(['shop/search'])?>">
                            <div class="hero__search__categories">
                                <?=Yii::t('app','allCategories');?>
                            </div>
                            <input type="text" id="searchInput" name="key" value="<?=Yii::$app->request->get('key');?>"  placeholder="<?=Yii::t('app','plhSearch')?>" required>
                            <input type="hidden" name="lang" value="<?=Yii::$app->language;?>">
                            <button type="submit" class="site-btn"><?=Yii::t('app','search');?></button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <a href="tel:<?=Yii::t('app','main_phone')?>" style="text-decoration: none; color: red"><i class="fa fa-phone"></i></a>
                        </div>
                        <div class="hero__search__phone__text">
                            <a href="tel:<?=Yii::t('app','main_phone')?>"><h5><?=Yii::t('app','main_phone')?></h5></a>
                            <span><?=Yii::t('app','support');?></span>
                        </div>
                    </div>
                </div>
                <?php
                    if ($indexUrl){
                        echo $this->render('banner');
                    }else{
                        echo '';
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->