<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mr-4">
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <img src="/template/images/profile.png" alt="" style="width: 25px; height: 25px; color: #a0a0a0; margin-right: 5px">
                    <a href="##" style="text-decoration: none; color: black" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">Admin</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="/template/images/logo1.png" alt="iteach Logo" style="width: 120px; height: 120px;">
                            <h4 style="color: #ff77ff; margin-top: 10px"><b>Japan Cosmetics</b></h4>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer d-flex" style="justify-content: space-between;">
                            <div class="ml-3">
                                <a href="<?=Url::to(['/profilemanager'])?>" class="btn btn-success btn-flat"><img src="/template/images/cabinet1.png" alt="img" style="width: 30px; height: 20px; margin-bottom: 3px; margin-right: 5px;">Kabinet</a>
                            </div>
                            <div>
                                <a href="<?=Url::to(['site/logout'])?>" class="btn btn-danger btn-flat" data-method='post'><img src="/template/images/exit.png" alt="img" style="width: 30px; height: 20px; margin-bottom: 3px; margin-right: 5px">Chiqish</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </ul>
</nav>
<!-- /.navbar -->

