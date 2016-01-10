<?php
/**
 * Created by IntelliJ IDEA.
 * User: abhinav
 * Date: 9/1/16
 * Time: 6:48 PM
 */

namespace app\models;


use yii\helpers\ArrayHelper;

class Base extends \yii\db\ActiveRecord {

    public static function asKeyVal() {
        return ArrayHelper::map(static::find()->all(), 'id', 'name');
    }
}
