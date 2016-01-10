<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "builder".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Property[] $properties
 */
class Builder extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'builder';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id'   => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties() {
        return $this->hasMany(Property::className(), ['builder_id' => 'id']);
    }
}
