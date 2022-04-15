<?php
/**
 * @var $this yii\web\View
 * @var common\models\BlogNews $blogNews;
 * @var common\models\BlogNews $recentNew;
 * @var common\models\BlogNews $pagination;
 * @var common\models\BlogCategory $blogCategory;
 * @var common\models\BlogNews $id;
 */

use common\models\BlogCategory;
use common\models\BlogNews;
use yii\helpers\Url;

$blogCategories = BlogCategory::find()
    ->andWhere(['status' => BlogCategory::STATUS_ACTIVE])
    ->all();

$recentNews = BlogNews::find()
    ->andWhere(['status' => BlogNews::STATUS_ACTIVE])
    ->limit(3)
    ->orderBy(['created_at'=>SORT_DESC])
    ->all();
?>

<div class="col-lg-4 col-md-5">
    <div class="blog__sidebar">
        <div class="blog__sidebar__search">
            <form action="<?=Url::to(['blog/search'])?>" method="get">
                <input type="search" id="searchInput" name="key" value="<?=Yii::$app->request->get('key');?>" placeholder="Search..." required>
                <input type="hidden" name="lang" value="<?=Yii::$app->language;?>">
                <button type="submit"><span class="icon_search"></span></button>
            </form>
        </div>
        <div class="blog__sidebar__item">
            <h4><?=Yii::t('app','blog_category')?></h4>
            <ul>
                <li><a href="<?=Url::to(['blog/index']);?>"><?=Yii::t('app','all');?>
                        (<?php echo BlogNews::find()->count();?>)</a></li>
                <?php foreach ($blogCategories as $blogCategory) : ?>
                    <li><a href="<?=Url::to(['blog/index','id'=>$blogCategory->id]);?>"><?=$blogCategory->name;?>
                            (<?php echo BlogNews::find()->where(['blog_category_id'=>$blogCategory->id])->count();?>)</a></li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="blog__sidebar__item">
            <h4><?=Yii::t('app','recentNews');?></h4>
            <div class="blog__sidebar__recent">
                <?php foreach ($recentNews as $recentNew) : ?>
                    <a href="<?=Url::to(['blog/detail','id'=>$recentNew->id]);?>" class="blog__sidebar__recent__item">
                        <div class="blog__sidebar__recent__item__pic">
                            <img src="<?=$recentNew->smallImage;?>" alt="">
                        </div>
                        <div class="blog__sidebar__recent__item__text">
                            <h6><?=$recentNew->theme;?></h6>
                            <span><?=$recentNew->date;?></span>
                        </div>
                    </a>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
