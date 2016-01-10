<?php

/**
 * @var app\models\PropertySearch $searchModel
 * @var array $areaRange
 * @var array $priceRange
 * @var yii\data\ActiveDataProvider $dataProvider
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = 'Property Listing';

$type = Html::getAttributeValue($searchModel, 'type');
?>

<div class="clearfix"></div>

<div class="page-wrap properties-page">

    <div class="container">
        <h2 class="page-title">All Properties</h2>
    </div>

    <?php Pjax::begin(['formSelector' => '#frm-search,#frm-filter']) ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="property-filter">
                    <?= Html::a('All', ['index'], ['class' => $type == null ? 'active' : '']) ?>
                    <?= Html::a(
                        'Rent',
                        ['index', 'PropertySearch[type]' => 'rent'],
                        ['class' => $type == 'rent' ? 'active' : '']
                    ) ?>
                    <?= Html::a(
                        'Sell',
                        ['index', 'PropertySearch[type]' => 'sell'],
                        ['class' => $type == 'sell' ? 'active' : '']
                    ) ?>
                    <?= Html::a(
                        'Buy',
                        ['index', 'PropertySearch[type]' => 'buy'],
                        ['class' => $type == 'buy' ? 'active' : '']
                    ) ?>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="property-views">
                    <a href="javascript:;"><i class="fa fa-th-large"></i>Grid</a>
                    <a href="javascript:;" class="active"><i class="fa fa-bars"></i>List</a>
                    <a href="javascript:;"><i class="fa fa-map"></i>Map</a>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <?php $form = ActiveForm::begin(
                    [
                        'id'     => 'frm-search',
                        'method' => 'get',
                        'action' => ['index']
                    ]
                ) ?>
                <div class="input-group">
                    <?= AutoComplete::widget(
                        [
                            'model'         => $searchModel,
                            'attribute'     => 'search',
                            'clientOptions' => [
                                'source'    => Url::to(['site/ajax-autocomplete']),
                                'minLength' => 2,
                                'select'    => new JsExpression(
                                    '
                                    function( event, ui ) {
                                        window.location = ui.item.url;
                                    }
                                '
                                )
                            ],
                            'options'       => [
                                'placeholder' => 'Enter City, Developer or Title',
                                'class'       => 'form-control'
                            ]
                        ]
                    ) ?>

                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"
                               style="margin: 0px"></i>
                        </button>
                    </div>

                </div>
                <?php $form->end() ?>
            </div>
        </div>

        <div class="row">
            <!-- SIDEBAR -->
            <?= $this->render(
                '_sidebar',
                [
                    'searchModel' => $searchModel,
                    'priceRange'  => $priceRange,
                    'areaRange'   => $areaRange
                ]
            ) ?>

            <div class="col-md-8">
                <div class="row properties-list">
                    <?=
                    \yii\widgets\ListView::widget(
                        [
                            'dataProvider' => $dataProvider,
                            'itemView'     => '_item',
                            'layout'       => '{items}{pager}'
                        ]
                    ) ?>
                </div>
            </div>
        </div>
    </div>


    <?php Pjax::end() ?>
</div>
