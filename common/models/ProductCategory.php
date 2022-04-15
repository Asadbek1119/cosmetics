<?php

namespace common\models;

use mohorev\file\UploadBehavior;
use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_category".
 *
 * @property int $id
 * @property int|null $status
 * @property string $name
 * @property string $product_url
 *
 * @property ProductCategoryLang[] $productCategoryLangs
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    use MultilingualLabelsTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'product_url'], 'string'],
            [['img'], 'image'],
        ];
    }

    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'uz' => 'Uzbek',
                    'ru' => 'Русский',
                    'en' => 'English',
                ],
                'attributes' => [
                    'name',
                ]
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/product_category/{id}',
                'url' => '/uploads/product_category/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 250, 'height' => 250],
                ],
            ],
        ];
    }

    public static function find()
    {
        $query = new MultilingualQuery(get_called_class());
        return $query->multilingual();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Nomi'),
            'status' => Yii::t('app', 'Holati'),
        ];
    }

    public static function getStatusFilter()
    {
        return [
            self::STATUS_ACTIVE => 'FAOL',
            self::STATUS_INACTIVE => 'FAOL EMAS',
        ];
    }

    public function getStatusLabel()
    {

        return ArrayHelper::getValue(self::getStatusFilter(), $this->status);
    }

    public function getImage()
    {
        return $this->getThumbUploadUrl('img', 'thumb');
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class, ['product_category_id' => 'id']);
    }

    public static function categories()
    {
        return ArrayHelper::map(ProductCategory::find()->all(), 'id', 'name');
    }
}
