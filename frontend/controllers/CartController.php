<?php

namespace frontend\controllers;

use common\models\Product;
use frontend\components\Cart;
use frontend\components\Liked;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class CartController extends Controller
{

    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionAddToCart($id)
    {
        $productId = $id;

        Cart::addToCart($productId);

        if (Yii::$app->request->isAjax) {

            $result['cartCount'] = Cart::count();
            $result['message'] = 'Added to Cart';
        }

        return $this->asJson($result);
    }

    public function actionRemoveFromCart($id)
    {
        $productId = $id;

        if (Yii::$app->request->isAjax) {

            Cart::removeFromCart($productId);

            $result['cartCount'] = Cart::count();
            $result['message'] = 'Remove from Cart';

            $query = Product::find()->where(['in', 'id', Cart::products()]);

            $countQuery = $query->count();

            $pagination = new Pagination([
                'totalCount' => $countQuery,
                'pageSize' => 6
            ]);

            $products = $query
                ->limit($pagination->limit)
                ->offset($pagination->offset)
                ->all();

            $result['yourCartProduct'] = $this->renderAjax('@frontend/views/shop/_cart', [
                'products' => $products,
                'pagination' => $pagination
            ]);
        }

        return $this->asJson($result);
    }
}