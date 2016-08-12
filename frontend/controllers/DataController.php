<?php
namespace frontend\controllers;
use yii\web\Response;

class DataController extends \yii\web\Controller {
      public $enableCsrfValidation = false;
      protected function jsonHead(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
    }

    protected function call($store_name, $arg = NULL) {
        $sql = "";
        if ($arg != NULL) {
            $sql = "call " . $store_name . "(" . $arg . ");";
        } else {
            $sql = "call " . $store_name . "();";
        }
        return $this->query_all($sql);
    }

    protected function exec_sql($sql) {
        $affect_row = \Yii::$app->db->createCommand($sql)->execute();
        return $affect_row;
    }

    protected function query_all($sql) {
        $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        return $rawData;
    }
    
    public function actionStation(){
        $sql = " select * from station limit 1 ";
        $raw = $this->query_all($sql);
        return $this->render('station',[
            'raw'=>$raw
        ]);
    }
}
