<?php

use common\models\FooterBusiness;
use common\models\FooterData;
    use common\models\FooterLinks;
use common\models\SocialNetworks;

$footerData = FooterData::find()
    ->andWhere(['status' => FooterData::STATUS_ACTIVE])
    ->one();

    $footerLinks = FooterLinks::find()
    ->andWhere(['status' => FooterLinks::STATUS_ACTIVE])
    ->all();

    $footerBusinesses = FooterBusiness::find()
    ->andWhere(['status' => FooterBusiness::STATUS_ACTIVE])
    ->all();

    $socialNetworks = SocialNetworks::find()
    ->andWhere(['status' => SocialNetworks::STATUS_ACTIVE])
    ->all();
?>
<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="/"><img src="/template/img/logo.png" alt=""></a>
                    </div>
                    <ul>
                        <li><a href="" style="text-decoration: none; color: black"><?=$footerData->address?></a></li>
                        <li><?=Yii::t('app','phone_number')?> <a href="tel:<?=$footerData->clearPhone()?>" style="text-decoration: none; color: black"><?=$footerData->phone?></a></li>
                        <li><?=Yii::t('app','email')?> <a href="mailto:<?=$footerData->email?>" style="text-decoration: none; color: black"><?=$footerData->email?></a></li>
                    </ul>
                </div>
                <div class="footer__widget">
                    <div class="footer__widget__social">
                        <?php foreach ($socialNetworks as $socialNetwork) : ?>
                        <a href="<?=$socialNetwork->network_url?>"><i class="<?=$socialNetwork->network_icon?>"></i></a>
                        <?php endforeach;?>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6><?=Yii::t('app','usefulLinks');?></h6>
                    <ul>
                        <?php foreach ($footerLinks as $footerLink) : ?>
                        <li><a href="<?=$footerLink->url;?>"><?=$footerLink->name;?></a></li>
                        <?php endforeach;?>
                    </ul>
                    <ul>
                        <?php foreach ($footerLinks as $footerLink) : ?>
                            <li><a href="<?=$footerLink->url;?>"><?=$footerLink->name;?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="">
                    <h3><?=Yii::t('app','businessHours');?></h3>
                    <p><?=Yii::t('app','businessData');?></p>
                    <ul>
                        <?php foreach ($footerBusinesses as $footerBusiness) : ?>
                        <li class="p-1 list-unstyled"><span><?=$footerBusiness->week_days;?></span> <span><?=$footerBusiness->work_hours;?></span></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <script>document.write(new Date().getFullYear());</script> <?=Yii::t('app','footerby')?></a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment"><img src="../template/img/payment-item.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->