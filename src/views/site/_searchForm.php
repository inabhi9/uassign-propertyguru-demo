<?php
/**
 * @var app\models\PropertySearch $searchModel
 */

use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

?>

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
