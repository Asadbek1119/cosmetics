<?php

use common\models\Banner;
use yii\db\Expression;
use yii\helpers\Url;

/** @var Banner $banners */

$banners = Banner::find()
    ->andWhere(['status' => Banner::STATUS_ACTIVE])
    ->orderBy(new Expression('rand()'))
    ->limit(1)
    ->all();
?>
<?php foreach ($banners as $banner) : ?>
    <div class="hero__item set-bg" data-setbg="<?= $banner->image; ?>">
        <div class="hero__text">
            <span><?= $banner->title; ?></span>
            <h2><?= $banner->subtitle; ?></h2>
            <p><?= $banner->description; ?></p>
            <a href="<?= Url::to(['shop/index'])?>" class="primary-btn"><?= $banner->button_label; ?></a>
        </div>
    </div>
<?php endforeach; ?>