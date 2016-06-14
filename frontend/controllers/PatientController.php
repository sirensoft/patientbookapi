<?php

namespace frontend\controllers;
use yii;
use yii\web\Response;

class PatientController extends \yii\web\Controller {
    public $enableCsrfValidation = false;

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

    
    protected function jsonHead(){
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    public function actionIndex($cid = NULL) {
        return $this->render('index', [
                    'cid' => $cid
        ]);
    }
    
    public function actionJson(){
        $this->jsonHead();
        $arr = ['name'=>'อุเทน','lname'=>'jad','age'=>'1111'];        
        return ($arr);
        
    }
    
    public function actionYoutube(){
        return $this->render('youtube');
    }
    public function actionCheckActive($cid=""){
        $sql = "select active from patient where cid='$cid'";
        return \Yii::$app->db->createCommand($sql)->queryScalar();
        
    }

}
