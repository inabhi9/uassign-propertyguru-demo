<?php

namespace app\controllers;

use app\models\Property;
use app\models\PropertySearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller {

    /**
     * Lists all Property models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PropertySearch();
        $areaRange = Property::getAreaRange();
        $priceRange = Property::getPriceRange();

        $searchModel->area_range = ($areaRange['min']) . ' - ' . ($areaRange['max']);
        $searchModel->price_range = ($priceRange['min']) . ' - ' . ($priceRange['max']);

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render(
            'index',
            [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
                'areaRange'    => $areaRange,
                'priceRange'   => $priceRange,
            ]
        );
    }

    /**
     * Displays a single Property model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render(
            'view',
            [
                'model' => $this->findModel($id),
            ]
        );
    }

    /**
     * Finds the Property model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Property the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Property::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAjaxAutocomplete($term) {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return PropertySearch::autocomplete($term);
    }


}
