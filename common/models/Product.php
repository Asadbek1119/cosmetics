<?php

namespace common\models;

/**
 * @var Product $products ;
 */

use frontend\components\Cart;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\Pagination;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * // * @property string|null $img
 * @property string $name
 * @property float|null $price
 * @property float|null $old_price
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $status
 * @property int|null $discount_status
 * @property int|null $discount_value
 * @property int|null $product_category_id
 *
 * @property ProductCategory $productCategory
 * @property ProductLang[] $productLangs
 */
class Product extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    const DISCOUNT_ACTIVE = 1;
    const DISCOUNT_INACTIVE = 0;
    use MultilingualLabelsTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'old_price'], 'number'],
            [['status', 'product_category_id', 'discount_status', 'discount_value'], 'integer'],
            [['created_at', 'updated_at', 'name', 'availability', 'shipping', 'weight'], 'string', 'max' => 255],
            [['description', 'information'], 'string'],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['product_category_id' => 'id']],
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
                    'description',
                    'availability',
                    'shipping',
                    'weight',
                    'information',
                ]
            ],
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'product',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@frontend/web') . '/uploads/product/images',
                'url' => '/uploads/product/images',
                'versions' => [
                    'small' => function ($img) {
                        /** @var ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new Box(120, 120));
                    },
                    'medium' => function ($img) {
                        /** @var ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 540;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ],
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
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
            'price' => Yii::t('app', 'Narx'),
            'old_price' => Yii::t('app', 'Eski narx'),
            'created_at' => Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at' => Yii::t('app', 'Tahrirlangan vaqti'),
            'status' => Yii::t('app', 'Holati'),
            'product_category_id' => Yii::t('app', 'Kategoriya nomi'),
            'name' => Yii::t('app', 'Nomi'),
            'description' => Yii::t('app', 'Izoh'),
            'availability' => Yii::t('app', 'Ombordagi holati'),
            'shipping' => Yii::t('app', 'Yetkazib berish'),
            'weight' => Yii::t('app', 'Og\'irligi'),
            'information' => Yii::t('app', 'Ma\'lumot'),
        ];
    }

    public static function getStatusFilter()
    {
        return [
            self::STATUS_ACTIVE => 'FAOL',
            self::STATUS_INACTIVE => 'FAOL EMAS',
        ];
    }

    public static function getDiscountStatusFilter()
    {
        return [
            self::DISCOUNT_ACTIVE => 'Chegirmali',
            self::DISCOUNT_INACTIVE => 'Chegirmasiz'
        ];
    }

    public function getStatusLabel()
    {

        return ArrayHelper::getValue(self::getStatusFilter(), $this->status);
    }

    public function getDiscountStatusLabel()
    {

        return ArrayHelper::getValue(self::getDiscountStatusFilter(), $this->discount_status);
    }

    /**
     * Gets query for [[ProductCategory]].
     *
     * @return ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'product_category_id']);
    }

    public function images($type = 'medium')
    {
        $images = [];

        foreach ($this->getBehavior('galleryBehavior')->getImages() as $image) {

            $images[] = $image->getUrl($type);
        }

        return $images;
    }

    public function image($type = 'medium')
    {

        $images = $this->images($type);

        if ($images) {

            $image = $images[0];

            return $image;

        } else {

            return '';
        }
    }

    public function priceCount()
    {
        $productPrice = 0;
        if ($this->discount_status == true) {

            $productPrice = $productPrice + ($this->old_price - ($this->old_price / 100 * $this->discount_value));
        } else {
            $productPrice = $productPrice + $this->price;
        }

        return $productPrice;
    }

}