<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use yeesoft\multilingual\behaviors\MultilingualBehavior;
use yeesoft\multilingual\db\MultilingualLabelsTrait;
use yeesoft\multilingual\db\MultilingualQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "blog_news".
 *
 * @property int $id
 * @property string|null $img
 * @property int|null $views
 * @property string $date
 * @property string $theme
 * @property string $description
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $status
 * @property int|null $blog_category_id
 *
 * @property BlogCategory $blogCategory
 * @property BlogNewsLang[] $blogNewsLangs
 */
class BlogNews extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    use MultilingualLabelsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['views', 'status', 'blog_category_id'], 'integer'],
            [['date', 'created_at', 'updated_at','theme','button_label'], 'string', 'max' => 255],
            [['content','description'], 'string'],
            [['img'], 'image'],
            [['blog_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlogCategory::className(), 'targetAttribute' => ['blog_category_id' => 'id']],
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
                    'theme',
                    'description',
                    'content',
                    'button_label',
                ]
            ],
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/blog_news/{id}',
                'url' => '/uploads/blog_news/{id}',
                'thumbs' => [
                    'smallImg' => ['width' => 70,'height'=>70],
                    'thumb' => ['width' => 370, 'height'=>266],
                    'bigImg' => ['width' => 770],
                ],
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
            'img' => Yii::t('app', 'Rasm'),
            'views' => Yii::t('app', 'Ko\'rishlar soni'),
            'date' => Yii::t('app', 'Vaqt'),
            'created_at' => Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at' => Yii::t('app', 'Tahrirlangan vaqti'),
            'status' => Yii::t('app', 'Holati'),
            'blog_category_id' => Yii::t('app', 'Kategoriya nomi'),
            'theme' => Yii::t('app', 'Yangilik mavzusi'),
            'content' => Yii::t('app', 'Matni'),
            'button_label' => Yii::t('app', 'Tugma yorlig\'i'),
        ];
    }
    public static function getStatusFilter()
    {
        return [
            self::STATUS_ACTIVE => 'FAOL',
            self::STATUS_INACTIVE => 'FAOL EMAS',
        ];
    }

    /**
     * @throws \Exception
     */
    public function getStatusLabel()
    {

        return ArrayHelper::getValue(self::getStatusFilter(), $this->status);
    }
    public function getSmallImage()
    {
        return $this->getThumbUploadUrl('img', 'smallImg');
    }

    public function getImage()
    {
        return $this->getThumbUploadUrl('img', 'thumb');
    }

    public function getBigImage()
    {
        return $this->getThumbUploadUrl('img', 'bigImg');
    }

    /**
     * Gets query for [[BlogCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategory()
    {
        return $this->hasOne(BlogCategory::className(), ['id' => 'blog_category_id']);
    }

    public function getViewsCount()
    {
        return $this->hasMany(ViewsCount::class,['blog_news_id' => 'id']);
    }
}
