<?php
use yii\helpers\Html;

$badgeCls = [
    'sell' => 'label-success',
    'buy'  => 'label-primary',
    'rent' => 'label-info',
]
?>

<div class="col-md-12">
    <div class="item">
        <figure>
            <img src="<?= $model->images[0]->url ?>" alt="" class="img-responsive">
            <span class="label <?= $badgeCls[$model->type] ?>"><?= $model->typeValue ?></span>
            <div class="overlay">
                <?= Html::a(
                    'Detail',
                    ['view', 'id' => $model->id, 'slug' => $model->slug],
                    ['class' => 'btn btn-detail']
                ) ?>
            </div>
        </figure>
        <div class="item-data">
            <div class="item-header clearfix">
                <h3>
                    <?= Html::a(
                        $model->title,
                        ['view', 'id' => $model->id, 'slug' => $model->slug]
                    ) ?>
                </h3>
                <a class="favorite" href="javascript:;" data-id="<?= $model->id ?>">
                    <i class="fa fa-heart"></i>
                    <span class="count">0</span>
                </a>
                <span class="place"><i class="fa fa-map-marker"></i><?= $model->city->name ?></span>
            </div>
            <div class="item-detail">
                <span class="price"><?= $model->priceAsCurrency ?></span>
                <div class="left">
                    <span class="bed"><?= $model->bhk ?></span>
                    <?= printPropFeature($model->has_gym, 'gym', 'Gymnasium') ?>
                    <?= printPropFeature(
                        $model->has_power_backup,
                        'power-backup',
                        'Power Backup'
                    ) ?>
                    <?= printPropFeature($model->has_pool, 'pool', 'Swimming Pool') ?>
                    <?= printPropFeature($model->has_lift, 'lift', 'Elevator') ?>
                    <?= printPropFeature($model->has_play_area, 'playground', 'Playground') ?>
                </div>
                <div class="right">
                    <span class="area"><?= $model->buildup_area ?> sq.ft</span>
                </div>
            </div>
        </div>
    </div>
</div>
