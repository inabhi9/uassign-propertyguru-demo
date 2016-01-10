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
                <h3><a href="#"><?= $model->title ?></a></h3>
                <span class="favorite"><i class="fa fa-heart"></i>9</span>
                <span class="place"><i class="fa fa-map-marker"></i><?= $model->city->name ?></span>
            </div>
            <div class="item-detail">
                <span class="price"><?= $model->priceAsCurrency ?></span>
                <div class="left">
                    <span class="bed"><?= $model->bhk ?></span>
                    <span class="bath">2</span>
                    <span class="garage">2</span>
                    <span class="gym">1</span>
                </div>
                <div class="right">
                    <span class="area"><?= $model->buildup_area ?> sq.ft</span>
                </div>
            </div>
        </div>
    </div>
</div>
