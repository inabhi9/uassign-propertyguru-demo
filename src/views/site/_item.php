<?php
use yii\helpers\Html;

?>

<div class="col-md-12">
    <div class="item">
        <figure>
            <img src="<?= $model->images[0]->url ?>" alt="" class="img-responsive">
            <span class="label <?= $model->type ?>"><?= $model->typeValue ?></span>
            <div class="overlay">
                <a href="#" class="btn btn-detail">Detail</a>
            </div>
        </figure>
        <div class="item-data">
            <div class="item-header clearfix">
                <h3>
                    <?= Html::a($model->title, ['view', 'id' => $model->id]) ?>
                </h3>
                <a class="favorite" href="javascript:;" data-id="<?= $model->id ?>">
                    <i class="fa fa-heart"></i>
                    <span class="count">9</span>
                </a>
                <span class="place"><i class="fa fa-map-marker"></i><?= $model->city->name ?></span>
            </div>
            <div class="item-detail">
                <span class="price"><?= $model->priceAsCurrency ?></span>
                <div class="left">
                    <span class="bed"><?= $model->bhk ?></span>
                    <?= $model->has_gym == 1 ? '<span class="gym" title="Gymnasium">1</span>'
                        : '' ?>
                </div>
                <div class="right">
                    <span class="area"><?= $model->buildup_area ?> sq.ft</span>
                </div>
            </div>
        </div>
    </div>
</div>
