<?php
/**
 * @var common\models\BlogNews $detail ;
 * @var common\models\BlogNews $model ;
 */

use common\models\BlogNews;
use yii\helpers\Url;
$this->title = $detail->theme;

$similarPosts = BlogNews::find()
    ->andWhere(['status' => BlogNews::STATUS_ACTIVE, 'blog_category_id' => $detail->blog_category_id])
    ->andWhere(['!=', 'id', $detail->id])
    ->limit(3)
    ->orderBy(['created_at' => SORT_DESC])
    ->all();

?>
<!-- Blog Details Hero Begin -->
<section class="blog-details-hero set-bg" data-setbg="/template/img/blog/details/details-hero.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2><?= $detail->theme; ?></h2>
                    <ul>
                        <li><?= $detail->date ?></li>
                        <li><i class="fa fa-eye"></i> <?= $detail->getViewsCount()->count() ?> <?=Yii::t('app','views')?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->
<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <?= $this->render('header'); ?>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="<?= $detail->bigImage; ?>" alt="">
                    <p><?= $detail->content; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2><?= Yii::t('app', 'blogPost'); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($similarPosts as $similarPost) : ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?= $similarPost->image ?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> <?= $similarPost->date ?></li>
                                <li><i class="fa fa-eye"></i> <?= $similarPost->date ?></li>
                            </ul>
                            <h5>
                                <a href="<?= Url::to(['blog/detail', 'id' => $similarPost->id]); ?>"><?= $similarPost->theme ?></a>
                            </h5>
                            <p><?= $similarPost->description ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Related Blog Section End -->