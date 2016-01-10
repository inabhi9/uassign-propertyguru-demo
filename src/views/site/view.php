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
    <h2 class="page-title"><?= $model->title ?></h2>

    <div class="container">


        <div class="row">

            <!-- PROPERTY SLIDER -->
            <div class="col-md-7 property-slider">
                <figure>
                    <?= dosamigos\gallery\Carousel::widget(['items' => $images]); ?>
                    <span class="label sale"><?= $model->typeValue ?></span>
                </figure>
                <div class="thumbnails">

                </div>
            </div>
            <!-- PROPERTY SLIDER -->

            <!-- PROPERTY DATA -->
            <div class="col-md-5 property-data">
                <div class="prop-features prop-before">
                    <span class="location"><?= $model->city->name ?></span>
                    <span class="area"><?= $model->buildup_area ?> Sq Ft</span>
                </div>
                <div class="prop-price">
                    <strong class="price"><?= $model->priceAsCurrency ?></strong>
                    <a href="" class="btn btn-danger">Contact Agent</a>
                </div>
                <div class="prop-features">
                    <span class="bed"><?= $model->bhk ?> Bedroom</span>
                </div>
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

