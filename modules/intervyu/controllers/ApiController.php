<?php
namespace app\modules\intervyu\controllers;

use Yii;
use yii\web\Response;
use app\modules\intervyu\models\Nomzodlar;
use yii\helpers\Json;
use yii\rest\ActiveController;

/**
 *  REST FUll API
 *  Nomzodlar ma'lumotlari bilan ishlash uchun 
 *  Author Oybek Ne'matov 
 */
 class ApiController extends ActiveController
 {
    public $modelClass = Nomzodlar::class;
    
    // Nomzod ma'lumotlarini json formatda olish
    public function actionGet($id=null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if ( isset($id) )
            return Nomzodlar::findOne(['id'=>$id]);
        else 
            return Nomzodlar::find()->all();  
    }
    // Yangi  nomzzod qo'shish
    public function actionCreate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;      

        $nomzod = new Nomzodlar();
        $nomzod->attributes = Yii::$app->request->post();

        if ( $nomzod->validate() ) {
             $nomzod->save();
             return ['status'=>true, 'data' => "Muvoffaqiyatli yuklandi"];
        }  

        return ['status'=>false, 'data' => "Ma'lumotni kiritishda xatolik"];
    }
    // Nomzod ma'lumotini o'zgartirish 
    public function actionUpdate($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;  
         if( isset($id) ){        
            if ( $nomzod = Nomzodlar::find()->where(['id' => $id])->one() ){
                $nomzod->attributes = Yii::$app->request->post();
                if ( $nomzod->validate() ) {
                    $nomzod->save();
                    return ['status'=>true, 'data' => "Malumotlar muvoffaqiyatli o'zgartirildi"];
                } 
            } 
         }                 

        return ['status'=>false, 'data' => "Ma'lumotni kiritishda xatolik"];
    }
    // Nomzod ma'lumotini O'chirish 
    public function actionDelete($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;   
        if ( isset($id) ) {           
            if ( $nomzod = Nomzodlar::findOne(['id' => $id]) ){            
                    $nomzod->delete();
                    return ['status'=>true, 'data' => "Malumotlar muvoffaqiyatli o'chirildi"];
            }
        }               

        return ['status'=>false, 'data' => "Ma'lumotni kiritishda xatolik"];
    }
 }

?>