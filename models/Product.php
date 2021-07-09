<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $price
 * @property string|null $date_and_time
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'date_and_time'], 'required'],
            [['price'], 'match', 'pattern' => '/^(\d){1,9}+(\.\d\d)?$/'],
            [['date_and_time'], 'datetime', 'format' => 'dd.MM.yyyy H:i:s'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function beforeSave($insert){
        
        if($this->date_and_time){
            $this->date_and_time = Yii::$app->formatter->asDate(strtotime($this->date_and_time), "php:Y-m-d H:i:s");
            
          }         

        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        parent::afterFind();

        $this->date_and_time = Yii::$app->formatter->asDate(strtotime($this->date_and_time), "php:d.m.Y H:i:s");
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'date_and_time' => 'Date And Time',
        ];
    }
}
