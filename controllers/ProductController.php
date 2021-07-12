<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Product;
use yii\data\ActiveDataProvider;

class ProductController extends ActiveController
{
    public $modelClass = 'app\models\Product';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

       
        $behaviors['corsFilter']['class']= \yii\filters\Cors::className();
        
        // $behaviors['corsFilter']['сors']['Origin'] = ['http://www.github.com', 'https://www.github.com'];

        return $behaviors;
    }


 /**
 * @OA\Info(title="Yii2-user-api", version="0.1")
 * 
 *  @OA\Schemes(format="http")
 * 
 *  @OA\Tag(
 *     name="Product",
 *     description="Products endpoints",
 * )
 */

/**
 * 
 * @OA\Get(
 *      path="/products",
 *      tags={"Product"},
 *      description="Get list of products",
 * 
 *       @OA\Response(response="200", description="Products list"),        
 *       @OA\Response(response=404, description="Not Found"),
 * )
 * 
 * @OA\POST(path="/products", tags={"Product"},
 *      @OA\RequestBody(
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  required={"name", "price", "date_and_time"},
 *                  @OA\Property(property="name", type="string"),
 *                  @OA\Property(property="price", type="string"),
 *                  @OA\Property(property="date_and_time", type="string")
 *              )
 *          )
 *      ),
 * 
 * 
 * @OA\Response(response=201, description="Successful operation")
 * 
 * )
 *  
 */

public function actions()
{
    $actions = parent::actions();

    // настроить подготовку провайдера данных с помощью метода "prepareDataProvider()"
    $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

    return $actions;
}

public function prepareDataProvider()
{
        // подготовить и вернуть провайдер данных для действия "index"
        $query = Product::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100,
            ],
            'sort' => [
                'defaultOrder' => [
                    'date_and_time' => SORT_DESC
                ]
            ],
        ]);
        
        // returns an array of Post objects
        $products = $provider->getModels();

        
        return $products;
}

}