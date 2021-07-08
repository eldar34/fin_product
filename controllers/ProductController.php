<?php

namespace app\controllers;

use yii\rest\ActiveController;

class ProductController extends ActiveController
{
    public $modelClass = 'app\models\Product';


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

}