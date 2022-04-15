<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Url;

/** @var \common\models\Product $products */
/** @var \yii\data\Pagination $pagination */
?>
<table>
    <thead>
    <tr>
        <th class="shoping__product"><?= Yii::t('app', 'products') ?></th>
        <th><?= Yii::t('app', 'price') ?></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php if ($products): ?>
        <?php foreach ($products as $product) : ?>

            <tr>
                <td class="shoping__cart__item">
                    <img src="<?= $product->image('small') ?>" alt="">
                    <h5><?= $product->name ?></h5>
                </td>
                <td class="shoping__cart__price">$
                    <?php if ($product->discount_status == true)
                        echo $product->old_price - ($product->old_price / 100 * $product->discount_value);
                    else
                        echo $product->price;
                    ?>
                </td>
                <td class="shoping__cart__quantity shoping__cart__item__close">
                    <a href="<?= Url::to(['liked/remove-from-liked', 'id' => $product->id]) ?>"
                       class="remove-from-liked"><span class="icon_close"></span></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

    </tbody>
</table>
<div class="product__pagination">
    <?php
    echo LinkPager::widget([
        'pagination' => $pagination
    ])
    ?>
</div>
