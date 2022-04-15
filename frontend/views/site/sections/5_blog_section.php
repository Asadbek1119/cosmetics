<?php
/**
 * @var BlogNews $recentNew
 */

use common\models\BlogNews;
use yii\helpers\Url;

    $recentNews = BlogNews::find()
    ->andWhere(['status' => BlogNews::STATUS_ACTIVE])
    ->limit(3)
    ->orderBy(['created_at'=>SORT_DESC])
    ->all();
?>

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2><?=Yii::t('app','fromBlog');?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($recentNews as $recentNew) : ?>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="<?=$recentNew->image;?>" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> <?=$recentNew->date;?></li>
                            <li><i class="fa fa-eye"></i> <?=$recentNew->getViewsCount()->count();?></li>
                        </ul>
                        <h5><a href="<?=Url::to(['blog/detail','id'=>$recentNew->id]);?>"><?=$recentNew->theme;?></a></h5>
                        <p><?=$recentNew->description;?> </p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<!-- Blog Section End -->