<?php
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\Marker;
use yii\helpers\Url;


$images = [];
foreach ($model->images as $image) {
    $images[] = [
        'url' => $image->url,
        'src' => $image->url
    ];
}

?>

<div class="page-wrap properties-page property-single">
    <div class="panel">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-7">
                    <h2><?= $model->title ?>
                        <small>by <?= $model->builder->name ?></small>
                    </h2>
                    <span><?= $model->address ?></span>
                </div>
                <div class="col-md-2">
                    <h2 class="area"><?= $model->bhk ?> BHK</h2>
                    <h6 class="area"><?= $model->buildup_area ?>
                        <small>Sq Ft</small>
                    </h6>
                </div>
                <div class="col-md-3">
                    <h2><?= $model->priceAsCurrency ?></h2>
                <span>
                    ₹ <?= round($model->price / $model->buildup_area, 2) ?> / Sq Ft.
                </span>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <!-- PROPERTY SLIDER -->
            <div class="col-md-8 property-slider" style="padding-right: 30px; padding-left: 0px">
                <figure>
                    <?= dosamigos\gallery\Carousel::widget(['items' => $images]); ?>
                    <span class="label sale">
                        <?= $model->kindValue . ' | ' . $model->typeValue ?>
                    </span>
                </figure>
            </div>
            <!-- PROPERTY SLIDER -->

            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Overview
                    </div>
                    <div class="panel-body">
                        <!-- PROPERTY DATA -->
                        <h6>Amenities</h6>
                        <hr style="margin: 10px 0px"/>
                        <div class="property-data" style="margin-bottom: 0px">
                            <ul>
                                <?= $model->has_lift ? '<li>Elevator</li>' : '' ?>
                                <?= $model->has_power_backup ? '<li>Power Backup</li>' : '' ?>
                                <?= $model->has_pool ? '<li>Swimming Pool</li>' : '' ?>
                                <?= $model->has_community_hall ? '<li>Community Center</li>' : '' ?>
                                <?= $model->has_play_area ? '<li>Children Play Ground</li>' : '' ?>
                                <?= $model->has_gym ? '<li>Gym</li>' : '' ?>
                            </ul>
                        </div>
                        <!-- PROPERTY DATA -->

                        <h6 style="margin-top: 35px">Description</h6>
                        <hr style="margin: 10px 0px"/>
                        <p> <?= $model->description ?> </p>
                        <!-- PROPERTY DATA -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="panel">
        <div class="panel-heading">
            <div class="caption">
                <h3>Locality</h3>
                EXPLORE NEIGHBOURHOOD - MAP VIEW
            </div>

        </div>
        <div class="panel-body">
            <?php
            $coord = new LatLng($model->latLng);
            $marker = new Marker(
                [
                    'position' => $coord,
                    'icon'     => Url::to('@web/images/mapicon.png')
                ]
            );
            $map = new Map(
                [
                    'center' => $coord,
                    'zoom'   => 15,
                    'width'  => '100%'
                ]
            );
            $map->addOverlay($marker);
            echo $map->display();
            ?>
        </div>
    </div>
</div>

