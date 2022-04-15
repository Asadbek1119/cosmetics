<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section class="breadcrumb-section set-bg" data-setbg="../template/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="site-error">
                    <h1 style="color: #ffffff; font-weight: bold"><?= Html::encode($this->title) ?></h1>
                    <div class="alert">
                        <h5 style="color: #ffffff; font-weight: bold"><?= nl2br(Html::encode($message)) ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
