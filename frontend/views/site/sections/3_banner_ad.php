<?php
    use common\models\BannerAd;

    $bannerAds = BannerAd::find()
    ->andWhere(['status' => BannerAd::STATUS_ACTIVE])
    ->all();
?>

<!-- Banner Begin -->
<h3 class="text-center font-weight-bold mb-4"><?=Yii::t('app','bannerAd')?></h3>
<div class="banner">
    <div class="container">
        <div class="row">
            <?php foreach ($bannerAds as $bannerAd) : ?>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?=$bannerAd->image;?>" alt="">
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<!-- Banner End -->
