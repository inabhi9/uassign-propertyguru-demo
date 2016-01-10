<?php
/**
 * Created by IntelliJ IDEA.
 * User: abhinav
 * Date: 9/1/16
 * Time: 2:46 PM
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LibFontAwesome extends AssetBundle {
    public $sourcePath = '@bower/font-awesome';

    public $css = [
        'css/font-awesome.min.css'
    ];
}
