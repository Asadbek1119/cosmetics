<?php

use common\models\User;

$user = User::find()->andWhere(['status' => User::STATUS_ACTIVE])->one();
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Yii::$app->homeUrl ?>" class="brand-link d-flex align-items-center">
        <img src="/template/images/favicon.ico" alt="iteach Logo"
             style="width: 35px; height: 35px; margin-left: 20px; margin-right: 8px;">
        <span class="brand-text font-weight-light">Japan Cosmetics</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/images/profile.png" alt=""
                     style="width: 30px; height: 30px; color: #a0a0a0;margin-top: 5px; margin-left: 10px">
            </div>
            <div class="info">
                <a href="#" class="d-block"><h5 style="margin: 0"><?= $user->username; ?></h5></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Do\'kon qism',
                        'icon' => 'fa-solid fa-cart-arrow-down',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Kategoriyalar', 'icon' => 'fas fa-shopping-bag', 'url' => ['/product-category']],
                            ['label' => 'Mahsulotlar', 'icon' => 'fas fa-cart-arrow-down', 'url' => ['/product']],
                            ['label' => 'Buyurtmalar', 'icon' => 'fas fa-info-circle', 'url' => ['/order-info']],
                        ]
                    ],
                    [
                        'label' => 'Yangiliklar qism',
                        'icon' => 'fa-solid fa-wifi',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Kategoriyalar', 'icon' => 'fas fa-bars', 'url' => ['/blog-category']],
                            ['label' => 'Blog yangiliklari', 'icon' => 'fas fa-newspaper', 'url' => ['/blog-news']],
                        ]
                    ],
                    [
                        'label' => 'Aloqa qism',
                        'icon' => 'fa-solid fa-headset',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Kontakt malumotlari', 'icon' => 'fas fa-database', 'url' => ['/contact-data']],
                            ['label' => 'Forma malumotlari', 'icon' => 'fas fa-at', 'url' => ['/email-data']],
                        ]
                    ],
                    [
                        'label' => 'Footer qism',
                        'icon' => 'fas fa-bars',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Malumotlar', 'icon' => 'fas fa-database', 'url' => ['/footer-data']],
                            ['label' => 'Havolalar', 'icon' => 'fas fa-link', 'url' => ['/footer-links']],
                            ['label' => 'Ish vaqtlari', 'icon' => 'fa-solid fa-clock', 'url' => ['/footer-business']],
                        ]
                    ],
                    ['label' => 'Banner qism', 'icon' => 'fa fa-image', 'url' => ['/banner']],
                    ['label' => 'Banner reklama', 'icon' => 'fas fa-ad', 'url' => ['/banner-ad']],
                    ['label' => 'Ijtimoiy tarmoqlar', 'icon' => 'fas fa-globe', 'url' => ['/social-networks']],
                    ['label' => 'Tarjimalar', 'icon' => 'fas fa-language', 'url' => ['/translate-manager']],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>