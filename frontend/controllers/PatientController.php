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
    public function actionImage($cid=""){
        $sql = "SELECT t.patient_image FROM patient_image t WHERE t.cid = '$cid'";
        $raw = \Yii::$app->db->createCommand($sql)->queryScalar();
        //$img_code = base64_encode($raw );
        //return  "<img src= \"data:image/jpeg;base64,$img_code\" />";
        header('Content-Type: image/png');
         //\Yii::$app->response->format = Response::FORMAT_RAW;
        echo $raw ;
        
    }
    public function actionAppoint($cid=""){
        $this->jsonHead();
        $sql = " SELECT min(t.next_date) as mdate,t.next_time as mtime,t.cid
,t.app_note mnote,h.hosname hospcode,t.app_clinic mclinic,t.app_doctor mdoctor FROM appointment t
LEFT JOIN chospital_amp h on h.hoscode = t.hospcode
WHERE t.next_date >= CURDATE() AND t.cid = '$cid' ";
        $raw_array = $this->query_all($sql);        
        
        return $raw_array;
    }

}
