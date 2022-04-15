<?php

namespace frontend\components;

use common\models\Product;
use Yii;

class Liked
{
    public static function addToLiked($product_id)
    {
        $session = Yii::$app->session;

        if (!$session->has('liked')) {

            $session->set('liked', []);

            $_SESSION['liked'][$product_id] = 1;

        } elseif ($session->has('liked') && $_SESSION['liked'][$product_id]) {

            $_SESSION['liked'][$product_id] = 1;

            return true;

        } else {

            $_SESSION['liked'][$product_id] = 1;
        }

    }

    public static function removeFromLiked($product_id)
    {
        unset($_SESSION['liked'][$product_id]);
    }

    public static function count()
    {
        $counts = Yii::$app->session->get('liked');

        $s = 0;
        if (is_array($counts) || is_object($counts)) {
            foreach ($counts as $count) {
                $s = $s + $count;
            }
        }
        return $s;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function products()
    {
        $ids = [];
        $productIds = Yii::$app->session->get('liked');

        foreach ($productIds as $key => $productId) {
            $ids[] = $key;
        }

        $products = Product::find()
            ->andWhere(['in', 'id', $ids])
            ->all();

        return $products;
    }
}