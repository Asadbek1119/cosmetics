<?php

use frontend\components\Cart;
use yii\bootstrap4\LinkPager;
use yii\helpers\Url;

/** @var \common\models\Product $products */
/** @var \yii\data\Pagination $pagination */
?>

<table class="shopping_cart">
    <thead>
    <tr>
        <th class="shoping__product"><?= Yii::t('app', 'products') ?></th>
        <th><?= Yii::t('app', 'price') ?></th>
        <th><?= Yii::t('app', 'quantity') ?></th>
        <th><?= Yii::t('app', 'total') ?></th>
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
                <td class="shoping__cart__price">
                    $<?php echo $product->priceCount(); ?>
                </td>
                <td class="shoping__cart__quantity">
                    <div class="quantity">
                            <?= Cart::getProductCount($product->id) ?>
                    </div>
                </td>
                <td class="shoping__cart__total">
                    $<?php
                    echo $product->priceCount() * Cart::getProductCount($product->id);
                    ?>
                </td>
                <td class="shoping__cart__item__close">
                    <a href="<?= Url::to(['cart/remove-from-cart', 'id' => $product->id]); ?>"
                       class="remove_from_cart1"><span class="icon_close "></span></a>
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
