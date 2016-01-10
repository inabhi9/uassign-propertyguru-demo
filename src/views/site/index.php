<?php

/**
 * @var app\models\PropertySearch $searchModel
 * @var array $areaRange
 * @var array $priceRange
 * @var yii\data\ActiveDataProvider $dataProvider
 */

use yii\helpers\Html;
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

        <?= $this->render('_searchForm', ['searchModel' => $searchModel]) ?>

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
