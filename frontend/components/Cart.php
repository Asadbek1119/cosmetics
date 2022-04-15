<?php

namespace frontend\components;

use common\models\Product;
use Yii;

class Cart
{
    public static function addToCart($product_id)
    {

        $session = Yii::$app->session;

        if (!$session->has('product')) {

            $session->set('product', []);

            $_SESSION['product'][$product_id] = 1;

        } else {

            $_SESSION['product'][$product_id] = $_SESSION['product'][$product_id] + 1;
        }
    }

    public static function removeFromCart($product_id)
    {
        unset($_SESSION['product'][$product_id]);
    }

    public static function count()
    {
        $counts = Yii::$app->session->get('product');

        $s = 0;
        if (is_array($counts) || is_object($counts)) {
            foreach ($counts as $count) {
                $s = $s + $count;
            }
        }

        return $s;
    }

    public static function products()
    {
        $ids = [];

        $productIds = Yii::$app->session->get('product');

        if ($productIds) {
            foreach ($productIds as $key => $productId) {

                $ids[] = $key;
            }

        }

        return $ids;
    }

    public static function getProductCount($product_id)
    {

        return $_SESSION['product'][$product_id];
    }

    public static function getTotalPrice()
    {
        $products = Product::find()
            ->andWhere(['in', 'id', self::products()])
            ->all();

        $s = 0;

        foreach ($products as $product) {
            $s = $s + ((self::getProductCount($product->id)) * $product->priceCount());
        }

        return $s;
    }

}