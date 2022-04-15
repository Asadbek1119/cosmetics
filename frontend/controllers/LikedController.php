<?php

namespace frontend\controllers;

use common\models\Product;
use frontend\components\Liked;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class LikedController extends Controller
{
    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionAddToLiked($id)
    {
        $productId = $id;
        $liked = Liked::addToLiked($productId);

        if (Yii::$app->request->isAjax) {

            if (!$liked) {

                $result['likedCount'] = Liked::count();
                $result['message'] = 'Added to Liked';
                $result['status'] = 0;

            } else {

                $result['status'] = 1;
                $result['message'] = 'Already added';
            }


        }

        return $this->asJson($result);
    }

    public function actionRemoveFromLiked($id)
    {
        $productId = $id;


        if (Yii::$app->request->isAjax) {

            Liked::removeFromLiked($productId);

            $result['likedCount'] = Liked::count();
            $result['message'] = 'Remove from Liked';

            $query = Product::find()->where(['in', 'id', Liked::products()]);

            $countQuery = $query->count();

            $pagination = new Pagination([
                'totalCount' => $countQuery,
                'pageSize' => 6
            ]);

            $products = $query
                ->limit($pagination->limit)
                ->offset($pagination->offset)
                ->all();

            $result['yourLikedProduct'] = $this->renderAjax('@frontend/views/shop/_liked', [
                'products' => $products,
                'pagination' => $pagination
            ]);
        }

        return $this->asJson($result);
    }
}