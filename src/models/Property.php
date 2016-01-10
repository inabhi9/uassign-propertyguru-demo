<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property".
 *
 * @property integer $id
 * @property integer $type
 * @property string $title
 * @property double $price
 * @property integer $buildup_area
 * @property string $created_at
 * @property string $description
 * @property integer $color_id
 * @property integer $builder_id
 * @property integer $has_pool
 * @property integer $has_gym
 * @property integer $has_community_hall
 * @property integer $has_play_area
 * @property integer $has_power_backup
 * @property integer $has_lift
 * @property string $lat_lng
 * @property integer $bhk
 * @property string $address
 * @property integer city_id
 *
 * @property Image[] $images
 * @property Color $color
 * @property Builder $builder
 */
class Property extends \yii\db\ActiveRecord {
    public static $kind = [
        'apartment'  => 'Apartment',
        'tenement'   => 'Tenement',
        'bungalow'   => 'Bungalow',
        'pent_house' => 'Pent House',
        'row_house'  => 'Row house',
    ];

    public static $type = [
        'buy'  => 'Buy',
        'sell' => 'Sell',
        'rent' => 'Rent'
    ];

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'property';
    }

    public static function getAreaRange() {
        return self::getRange('buildup_area');
    }

    /**
     * Gets min and max value for the given field
     *
     * @param string $field Field to be ranged
     * @return array Array of ['min'=>integer, 'max'=>integer]
     */
    private static function getRange($field) {
        $data = self::find()
            ->select("MIN({$field}) as min, MAX({$field}) as max")
            ->asArray()
            ->one();

        $data['min'] = intval($data['min']);
        $data['max'] = intval($data['max']);

        return $data;
    }

    public static function getPriceRange() {
        return self::getRange('price');
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [
                [
                    'type',
                    'title',
                    'price',
                    'buildup_area',
                    'description',
                    'has_pool',
                    'has_gym',
                    'has_community_hall',
                    'has_play_area',
                    'has_power_backup',
                    'has_lift',
                    'lat_lng'
                ],
                'required'
            ],
            [
                [
                    'buildup_area',
                    'color_id',
                    'builder_id',
                    'has_pool',
                    'has_gym',
                    'has_community_hall',
                    'has_play_area',
                    'has_power_backup',
                    'has_lift',
                    'bhk'
                ],
                'integer'
            ],
            [['price'], 'number'],
            [['created_at'], 'safe'],
            [['description', 'lat_lng', 'address'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id'                 => 'ID',
            'type'               => 'Type',
            'title'              => 'Title',
            'price'              => 'Price',
            'buildup_area'       => 'Buildup Area',
            'construction_year'  => 'Construction Year',
            'created_at'         => 'Created At',
            'description'        => 'Description',
            'color_id'           => 'Color ID',
            'possession'         => 'possession',
            'builder_id'         => 'Builder ID',
            'has_pool'           => 'Swimming Pool',
            'has_gym'            => 'Gymnasium',
            'has_community_hall' => 'Community Hall',
            'has_play_area'      => 'Play Area',
            'has_power_backup'   => 'Power Backup',
            'has_lift'           => 'Lift',
            'lat_lng'            => 'Lat Lng',
            'bhk'                => 'Bhk',
            'address'            => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages() {
        return $this->hasMany(Image::className(), ['property' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor() {
        return $this->hasOne(Color::className(), ['id' => 'color_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuilder() {
        return $this->hasOne(Builder::className(), ['id' => 'builder_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity() {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getPriceAsCurrency() {
        return Yii::$app->formatter->asCurrency($this->price, 'INR');
    }

    public function getTypeValue() {
        return self::$type[$this->type];
    }

    public function getKindValue() {
        return self::$kind[$this->kind];
    }

    public function getLatLng() {
        if (empty($this->lat_lng)) {
            return [];
        }

        $_ = explode(',', $this->lat_lng);

        return ['lat' => floatval($_[0]), 'lng' => floatval($_[1])];
    }
}
