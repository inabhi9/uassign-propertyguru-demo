<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

/**
 * PropertySearch represents the model behind the search form about `app\models\Property`.
 */
class PropertySearch extends Property {
    public static $ORDERS = [
        'price'      => 'Price: Low to High',
        'price DESC' => 'Price: High to Low',
        'buildup_area'      => 'Area: Low to High',
        'buildup_area DESC' => 'Area: High to Low',
    ];
    public $area_range;
    public $price_range;
    public $search;
    public $order_by;

    public static function autocomplete($term) {
        $query = static::find();
        $query->joinWith(['builder', 'city']);

        $query->orFilterWhere(['like', 'title', $term]);
        $query->orFilterWhere(['like', 'builder.name', $term]);
        $query->orFilterWhere(['like', 'city.name', $term]);

        $query->limit(10);

        $result = [];
        foreach ($query->all() as $property) {
            $label = $property->title . ' by ' .
                $property->builder->name . ' in ' .
                $property->city->name;
            $result[] = [
                'id'    => $property->id,
                'label' => $label,
                'url' => Url::to(['site/view', 'id' => $property->id, 'slug' => $property->slug])
            ];
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [
                [
                    'id',
                    'buildup_area',
                    'color_id',
                    'builder_id',
                    'has_pool',
                    'has_gym',
                    'has_community_hall',
                    'has_play_area',
                    'has_power_backup',
                    'has_lift',
                    'bhk',
                    'city_id'
                ],
                'integer'
            ],
            [
                [
                    'type',
                    'kind',
                    'title',
                    'created_at',
                    'description',
                    'lat_lng',
                    'address',
                    'area_range',
                    'price_range',
                    'search',
                    'order_by'
                ],
                'safe'
            ],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Property::find();
        $query->joinWith(['builder', 'city', 'color']);

        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
            ]
        );

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orderBy($this->order_by);

        $query->andFilterWhere(
            [
                'id'                 => $this->id,
                'price'              => $this->price,
                'buildup_area'       => $this->buildup_area,
                'created_at'         => $this->created_at,
                'color_id'           => $this->color_id,
                'builder_id'         => $this->builder_id,
                'has_pool'           => $this->has_pool == 1 ? 1 : null,
                'has_gym'            => $this->has_gym == 1 ? 1 : null,
                'has_community_hall' => $this->has_community_hall == 1 ? 1 : null,
                'has_play_area'      => $this->has_play_area == 1 ? 1 : null,
                'has_power_backup'   => $this->has_power_backup == 1 ? 1 : null,
                'has_lift'           => $this->has_lift == 1 ? 1 : null,
                'bhk'                => $this->bhk,
                'city_id'            => $this->city_id,
            ]
        );

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'kind', $this->kind])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'lat_lng', $this->lat_lng])
            ->andFilterWhere(['like', 'address', $this->address]);


        // Filter by area range
        if ($this->area_range) {
            $areaRange = explode('-', $this->area_range);
            $query->andFilterWhere(['>=', 'buildup_area', $areaRange[0]]);
            $query->andFilterWhere(['<=', 'buildup_area', $areaRange[1]]);
        }

        // Filter by price range
        if ($this->price_range) {
            $priceRange = explode('-', $this->price_range);
            $query->andFilterWhere(['>=', 'price', $priceRange[0]]);
            $query->andFilterWhere(['<=', 'price', $priceRange[1]]);
        }

        if ($this->title) {
            $query->andWhere(
                'MATCH (title,description) AGAINST  (:value IN NATURAL LANGUAGE MODE)',
                [':value' => $this->title]
            );
        }

        // Filter by search term
        if ($this->search) {
            $term = $this->search;
            $query->andWhere(
                'title LIKE :term OR builder.name LIKE :term OR city.name LIKE :term',
                [':term' => "%$term%"]
            );
        }

        return $dataProvider;
    }
}
