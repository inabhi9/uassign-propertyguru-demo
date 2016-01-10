<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $url
 * @property integer $property
 *
 * @property Property $property0
 */
class Image extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['url', 'property'], 'required'],
            [['url'], 'string'],
            [['property'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id'       => 'ID',
            'url'      => 'Url',
            'property' => 'Property',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty0() {
        return $this->hasOne(Property::className(), ['id' => 'property']);
    }
}
