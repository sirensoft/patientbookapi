<?php

namespace frontend\controllers;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionAdd($m=null){
        //$m = \Yii::$app->request->post('m');
        
        $sql = " INSERT INTO `test` (`message`) VALUES ('$m') ";
        return \yii::$app->db->createCommand($sql)->execute();
        
    }
    public function actionRead(){
        $sql = "select * from patient ";
        $raw = \yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels'=>$raw
        ]);
        return $this->render('read',[
            'dataProvider'=>$dataProvider
        ]);
    }

}
