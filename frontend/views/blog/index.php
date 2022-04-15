<?php
/**
 * @var $this yii\web\View
 * @var common\models\BlogNews $blogNews;
 * @var common\models\BlogNews $pagination;
 * @var common\models\BlogNews $id;
 */

    use common\models\BlogCategory;
    use common\models\BlogNews;
    use yii\helpers\Url;
    use yii\widgets\LinkPager;

    $this->title = 'Blog';
$blogCategories = BlogCategory::find()
    ->andWhere(['status' => BlogCategory::STATUS_ACTIVE])
    ->all();

$recentNews = BlogNews::find()
    ->andWhere(['status' => BlogNews::STATUS_ACTIVE])
    ->limit(3)
    ->orderBy(['created_at'=>SORT_DESC])
    ->all();
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/template/img/hero.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?=Yii::t('app','blog');?></h2>
                    <div class="breadcrumb__option">
                        <a href="/"><?=Yii::t('app','home');?></a>
                        <span><?=Yii::t('app','blog');?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <?=$this->render('header')?>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    <?php foreach ($blogNews as $blogNew) : ?>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="<?=$blogNew->image;?>" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> <?=$blogNew->date;?></li>
                                    <li><i class="fa fa-eye"></i> <?=$blogNew->getViewsCount()->count();?></li>
                                </ul>
                                <h5><a href="<?=Url::to(['blog/detail','id'=>$blogNew->id]);?>"><?=$blogNew->theme;?></a></h5>
                                <p><?=$blogNew->description;?></p>
                                <a href="<?=Url::to(['blog/detail','id'=>$blogNew->id]);?>" class="blog__btn"><?=$blogNew->button_label;?><span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <?php
                            echo LinkPager::widget([
                                'pagination' => $pagination,
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
