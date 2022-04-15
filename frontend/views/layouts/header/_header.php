<?php

use common\models\SocialNetworks;
use frontend\components\Cart;
use frontend\components\Liked;
use yii\helpers\Url;

$socialNetworks = SocialNetworks::find()
    ->andFilterWhere(['status' => SocialNetworks::STATUS_ACTIVE])
    ->all();

$language = Yii::$app->language;
?>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="/template/img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <i class="fa fa-language"> </i>
            <?php
            if ($language == 'en')
                echo "<div>English</div>";
            if ($language == 'ru')
                echo "<div>Русский</div>";
            if ($language == 'uz')
                echo "<div>O'zbekcha</div>";
            ?>

            <span class="arrow_carrot-down"></span>
            <ul>
                <?php if ($language != 'en'): ?>
                    <li><a href="<?= Url::current(['lang' => 'en']) ?>">English</a></li>
                <?php endif; ?>
                <?php if ($language != 'ru'): ?>
                    <li><a href="<?= Url::current(['lang' => 'ru']) ?>">Русский</a></li>
                <?php endif; ?>
                <?php if ($language != 'uz'): ?>
                    <li><a href="<?= Url::current(['lang' => 'uz']) ?>">O'zbekcha</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <?php if (Yii::$app->user->isGuest) : ?>
            <i class="fa fa-user fa-lg"><a href="<?=Url::to(['/site/login'])?>" style="color: black; text-decoration: none; font-size: 16px"><?=Yii::t('app','login')?></a></i>
        <?php else:?>
            <div class="header__top__right__language">
                <i class="fa fa-user"> <?php echo Yii::$app->user->identity->username ?></i>

                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="<?= Url::to(['/profilemanager']) ?>"><?=Yii::t('app','cabinet')?></a></li>
                    <li><a href="<?= Url::to(['/site/logout']) ?>"><?=Yii::t('app','logout')?></a></li>
                </ul>
            </div>
        <?php endif;?>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li><a href="/"><?= Yii::t('app', 'homeHeader'); ?></a></li>
            <li><a href="<?= Url::to(['shop/index']); ?>"><?= Yii::t('app', 'shop'); ?></a></li>
            <li><a href="#"><?= Yii::t('app', 'pages'); ?></a>
                <ul class="header__menu__dropdown">
                    <li>
                        <a href="<?= Url::to(['shop/shopping-cart']) ?>"><?= Yii::t('app', 'shoppingCart'); ?></a>
                    </li>
                </ul>
            </li>
            <li><a href="<?= Url::to(['blog/index']); ?>"><?= Yii::t('app', 'blogHeader'); ?></a></li>
            <li><a href="<?= Url::to(['site/contact-us']); ?>"><?= Yii::t('app', 'contact'); ?></a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <?php foreach ($socialNetworks as $socialNetwork) : ?>
            <a href="<?= $socialNetwork->network_url ?>"><i
                        class="<?= $socialNetwork->network_icon ?>"></i></a>
        <?php endforeach; ?>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <?php foreach ($socialNetworks as $socialNetwork) : ?>
                                <a href="<?= $socialNetwork->network_url ?>"><i
                                            class="<?= $socialNetwork->network_icon ?>"></i></a>
                            <?php endforeach; ?>
                        </div>
                        <div class="header__top__right__language">
                            <i class="fa fa-language"> </i>
                            <?php
                            if ($language == 'en')
                                echo "<div>English</div>";
                            if ($language == 'ru')
                                echo "<div>Русский</div>";
                            if ($language == 'uz')
                                echo "<div>O'zbekcha</div>";
                            ?>

                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <?php if ($language != 'en'): ?>
                                    <li><a href="<?= Url::current(['lang' => 'en']) ?>">English</a></li>
                                <?php endif; ?>
                                <?php if ($language != 'ru'): ?>
                                    <li><a href="<?= Url::current(['lang' => 'ru']) ?>">Русский</a></li>
                                <?php endif; ?>
                                <?php if ($language != 'uz'): ?>
                                    <li><a href="<?= Url::current(['lang' => 'uz']) ?>">O'zbekcha</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php if (Yii::$app->user->isGuest) : ?>
                            <i class="fa fa-user fa-lg"> <a href="<?=Url::to(['/site/login'])?>" style="color: black; text-decoration: none; font-size: 16px"><?=Yii::t('app','login')?></a></i>
                        <?php else:?>
                        <div class="header__top__right__language">
                            <i class="fa fa-user"> <?php echo Yii::$app->user->identity->username ?></i>

                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="<?= Url::to(['/profilemanager']) ?>"><?=Yii::t('app','cabinet')?></a></li>
                                <li><a href="<?= Url::to(['/site/logout']) ?>"><?=Yii::t('app','logout')?></a></li>
                            </ul>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="/"><img src="../template/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li><a href="/"><?= Yii::t('app', 'homeHeader'); ?></a></li>
                        <li><a href="<?= Url::to(['shop/index']); ?>"><?= Yii::t('app', 'shop'); ?></a></li>
                        <li><a href="#"><?= Yii::t('app', 'pages'); ?></a>
                            <ul class="header__menu__dropdown">
                                <li>
                                    <a href="<?= Url::to(['shop/shopping-cart']) ?>"><?= Yii::t('app', 'shoppingCart'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?= Url::to(['blog/index']); ?>"><?= Yii::t('app', 'blogHeader'); ?></a></li>
                        <li><a href="<?= Url::to(['site/contact-us']); ?>"><?= Yii::t('app', 'contact'); ?></a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="<?= Url::to(['shop/liked-products']) ?>"><i class="fa fa-heart"></i> <span
                                        id="view-liked"><?= Liked::count() ?></span></a></li>
                        <li><a href="<?= Url::to(['shop/shopping-cart']) ?>"><i class="fa fa-shopping-bag"></i> <span
                                        id="view-cart"><?= Cart::count() ?></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->