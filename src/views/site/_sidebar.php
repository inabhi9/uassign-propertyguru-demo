<?php
/**
 * @var app\models\PropertySearch $searchModel
 * @var array $areaRange
 * @var array $priceRange
 */

use app\models\City;
use app\models\Color;
use app\models\Property;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;


?>

<aside class="col-md-4">

    <div class="property-search">
        <?php
        $form = ActiveForm::begin(
            [
                'id'     => 'frm-filter',
                'method' => 'get'
            ]
        ) ?>
        <?= $form->field($searchModel, 'city_id')
            ->dropDownList(City::asKeyVal(), ['prompt' => 'LOCATION'])
            ->label(false)
        ?>
        <?= $form->field($searchModel, 'kind')
            ->dropDownList(Property::$kind, ['prompt' => 'KIND'])
            ->label(false)
        ?>
        <?= $form->field($searchModel, 'type')
            ->dropDownList(Property::$type, ['prompt' => 'TYPE'])
            ->label(false)
        ?>

        <hr>

        <?= $form->field($searchModel, 'color_id')
            ->dropDownList(Color::asKeyVal(), ['prompt' => 'COLOR'])
            ->label(false)
        ?>

        <?= $form->field($searchModel, 'bhk')
            ->dropDownList([1, 2, 3], ['prompt' => 'BHK', 'class' => 'half first'])
            ->label(false)
        ?>

        <select class="half">
            <option>Baths</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>


        <hr>

        <div class="check-box">
            <div class="check-box">
                <label>
                    <?= $form->field($searchModel, 'has_pool')
                        ->checkbox(['class' => 'checkbox']) ?>
                </label>
                <label>
                    <?= $form->field($searchModel, 'has_gym')
                        ->checkbox(['class' => 'checkbox']) ?>
                </label>
                <label>
                    <?= $form->field($searchModel, 'has_lift')
                        ->checkbox(['class' => 'checkbox']) ?>
                </label>

                <label>
                    <?= $form->field($searchModel, 'has_play_area')
                        ->checkbox(['class' => 'checkbox']) ?>
                </label>
                <label>
                    <?= $form->field($searchModel, 'has_power_backup')
                        ->checkbox(['class' => 'checkbox']) ?>
                </label>
            </div>
        </div>

        <hr>

        <div class="range">
            <p>
                <label for="area" class="p-1">Area (Sq Ft)</label>
                            <span>
                                <?= Html::activeTextInput(
                                    $searchModel,
                                    'area_range',
                                    ['id' => 'area']
                                ) ?>
                            </span>
            </p>

            <?=
            \yii\jui\Slider::widget(
                [
                    'clientOptions' => [
                        'min'    => $areaRange['min'],
                        'max'    => $areaRange['max'],
                        'range'  => true,
                        'values' => explode(' - ', $searchModel->area_range),
                        'slide'  => new JsExpression(
                            'function (event, ui) {
                                            $("#area").val(ui.values[0] + " - " + ui.values[1]);
                                        }'
                        )
                    ]
                ]
            ) ?>

        </div>

        <div class="range">
            <p>
                <label for="price" class="p-2">Price (₹)</label>
                            <span>
                                <?= Html::activeTextInput(
                                    $searchModel,
                                    'price_range',
                                    ['id' => 'price']
                                ) ?>
                            </span>
            </p>
            <?=
            \yii\jui\Slider::widget(
                [
                    'id'            => 'price-range',
                    'clientOptions' => [
                        'min'    => $priceRange['min'],
                        'max'    => $priceRange['max'],
                        'range'  => true,
                        'values' => explode(' - ', $searchModel->price_range),
                        'slide'  => new JsExpression(
                            'function (event, ui) {
                                            $("#price").val(ui.values[0] + " - " + ui.values[1]);
                                        }'
                        )
                    ]
                ]
            ) ?>
        </div>

        <div class="buttons">
            <button class="btn btn-danger" type="submit">
                <i class="fa fa-search"></i>Search
            </button>

            <?= Html::a('Clear', ['index'], ['class' => 'btn btn-clear']) ?>
        </div>

        <?php $form->end() ?>
    </div>

</aside>
