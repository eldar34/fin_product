<?php

namespace app\assets; 

use yii\web\AssetBundle; 

class CustomAsset extends AssetBundle 
{ 
    public $sourcePath = '@bower';
    public $baseUrl = '@web'; 
    /* public $css = [
        'css/uikit.min.css',
    ]; */
    public $js = [
        'jquery-validation/dist/jquery.validate.min.js',
        'inputmask/dist/jquery.inputmask.bundle.js',
    ];
}