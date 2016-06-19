<?php

namespace frontend\controllers;

use yii;
use yii\web\Response;
use dosamigos\arrayquery\ArrayQuery;
use frontend\models\Patient;

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

    protected function jsonHead() {
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    public function actionIndex($cid = NULL) {
        return $this->render('index', [
                    'cid' => $cid
        ]);
    }

    public function actionInfo($cid = "") {

        $model = Patient::findOne(['cid' => $cid]);
        return $this->render('info', [

                    'model' => $model
        ]);
    }
    
    public function actionRisk($cid=""){
        $sql = " SELECT 

t.person_disease
,t.waist,t.weight,t.height,t.bmi,t.bmi_color,t.bmi_text
,t.dm_color,t.dm_text,t.ht_color,t.ht_text
,t.bps,t.bpd ,t.pulse
,t.ckd_color,t.ckd_text,t.cvd_color,t.cvd_text,t.cvd_risk
,t.last_update

FROM patient t WHERE t.cid = '$cid' ";
        
        $raw = $this->query_all($sql);
        return $this->render('risk',[
            'data'=>$raw[0]
        ]);
    }

    public function actionJson() {
        $this->jsonHead();
        $arr = ['name' => 'อุเทน', 'lname' => 'jad', 'age' => '1111'];
        return ($arr);
    }

    public function actionYoutube() {
        return $this->render('youtube');
    }

    public function actionCheckActive($cid = "") {
        $sql = "select active from patient where cid='$cid'";
        return \Yii::$app->db->createCommand($sql)->queryScalar();
    }

    public function actionImage($cid = "") {
        $sql = "SELECT t.patient_image FROM patient_image t WHERE t.cid = '$cid'";
        $raw = \Yii::$app->db->createCommand($sql)->queryScalar();
        //$img_code = base64_encode($raw );
        //return  "<img src= \"data:image/jpeg;base64,$img_code\" />";
        header('Content-Type: image/png');
        //\Yii::$app->response->format = Response::FORMAT_RAW;
        echo $raw;
    }

    public function actionAppoint($cid = "") {
        $this->jsonHead();
        $sql = " SELECT min(t.next_date) as mdate,t.next_time as mtime,t.cid
,t.app_note mnote,h.hosname hospcode,t.app_clinic mclinic,t.app_doctor mdoctor FROM appointment t
LEFT JOIN chospital_amp h on h.hoscode = t.hospcode
WHERE t.next_date >= CURDATE() AND t.cid = '$cid' ";
        $raw_array = $this->query_all($sql);

        return $raw_array;
    }
    
    
    public function actionInput(){
        
        $cid=\Yii::$app->request->post('cid');
        $date_input = \Yii::$app->request->post('date_input');
        $time_input = \Yii::$app->request->post('time_input');
        $weight=\Yii::$app->request->post('weight');
        $height=\Yii::$app->request->post('height');
        $waist=\Yii::$app->request->post('waist');
        $bps=\Yii::$app->request->post('bps');
        $bpd=\Yii::$app->request->post('bpd');
        $pulse=\Yii::$app->request->post('pulse');
        $sugar=\Yii::$app->request->post('sugar');
        $note1=\Yii::$app->request->post('note1');
        $note2=\Yii::$app->request->post('note2');
        
        $sql =" INSERT INTO `patient_input` (`cid`, `date_input`, `time_input`, `weight`, `height`, `waist`, `bps`, `bpd`, `pulse`, `sugar`, `note1`, `note2`) "
                . "VALUES ('$cid', '$date_input', '$time_input', '$weight', '$height', '$waist', '$bps', '$bpd', '$pulse', '$sugar', '$note1', '$note2') ";
    
        return $this->exec_sql($sql);
        
    }

}
