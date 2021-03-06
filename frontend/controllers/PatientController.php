<?php

namespace frontend\controllers;

use yii;
use yii\web\Response;
use dosamigos\arrayquery\ArrayQuery;
use frontend\models\Patient;
use common\components\AppController;

class PatientController extends AppController {

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
,t.dm_level,t.dm_color,t.dm_text
,t.ht_level,t.ht_color,t.ht_text
,t.bps,t.bpd ,t.pulse
,CONCAT(t.eye_date,' (',t.eye_result,')') eye
,CONCAT(t.kidney_date,' (',t.kidney_result,')') kidney
,CONCAT(t.foot_date,' (',t.foot_result,')') foot
,t.ckd_level,t.ckd_color,t.ckd_text
,t.cvd_level,t.cvd_color,t.cvd_text
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
,t.app_note mnote,h.hosname hospcode,t.app_clinic mclinic,t.app_doctor mdoctor
,if(TIMESTAMPDIFF(DAY,CURDATE(),min(t.next_date))>0,TIMESTAMPDIFF(DAY,CURDATE(),min(t.next_date)),0) mcount 
FROM appointment t
LEFT JOIN chospital_amp h on h.hoscode = t.hospcode
WHERE t.next_date >= CURDATE() AND t.cid = '$cid' ";
        $raw_array = $this->query_all($sql);

        return $raw_array;
    }
    
    
    public function actionInput(){
        if(!\Yii::$app->request->isPost){
            return 0;
        }
        $cid=\Yii::$app->request->post('cid');
        $date_input = date('Y-m-d');
        $time_input = date('H:i:s');
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
    public function actionInputList($cid=NULL){
        
        $sql = "select * from patient_input where cid= '$cid' order by date_input DESC,time_input DESC";
        $raw = $this->query_all($sql);
        
        return $this->render('input-list',[
            'raw'=>$raw
        ]);               
    }
    public function actionChart($cid=NULL){
        return $this->render('chart',[
           'cid'=>$cid
        ]);
    }
    
     public function actionHomeVisitList($cid=NULL){
        
        $sql = "select * from home_visit where cid= '$cid' order by date_input DESC,time_input DESC";
        $raw = $this->query_all($sql);
        
        return $this->render('home-visit-list',[
            'raw'=>$raw
        ]);               
    }
    
    public function actionHomeVisitInput(){
        if(!\Yii::$app->request->isPost){
            return 0;
        }
        $cid=\Yii::$app->request->post('cid');
        $date_input = date('Y-m-d');
        $time_input = date('H:i:s');
        $weight=\Yii::$app->request->post('weight');
        $height=\Yii::$app->request->post('height');
        $waist=\Yii::$app->request->post('waist');
        $bps=\Yii::$app->request->post('bps');
        $bpd=\Yii::$app->request->post('bpd');
        $pulse=\Yii::$app->request->post('pulse');
        $sugar=\Yii::$app->request->post('sugar');
        $note1=\Yii::$app->request->post('note1');
        $note2=\Yii::$app->request->post('note2');
        
        $sql =" INSERT INTO `home_visit` (`cid`, `date_input`, `time_input`, `weight`, `height`, `waist`, `bps`, `bpd`, `pulse`, `sugar`, `note1`, `note2`) "
                . "VALUES ('$cid', '$date_input', '$time_input', '$weight', '$height', '$waist', '$bps', '$bpd', '$pulse', '$sugar', '$note1', '$note2') ";
    
        return $this->exec_sql($sql);
        
    }
    
    public function actionLab($cid=NULL){
        $sql = " SELECT t.cid,t.date_serv,t.labname,t.labresult FROM lab_order t
WHERE t.cid = '$cid'  order by date_serv DESC";
        
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('lab',[
            'raw'=>$raw
        ]);
        
    }
    
    public function actionDrug($cid=NULL){
        $sql = " SELECT t.cid,t.date_serv,t.drugname FROM drug t
WHERE t.cid = '$cid'
AND t.date_serv = (SELECT max(date_serv) FROM drug WHERE cid='$cid')
 ";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('drug',[
            'raw'=>$raw
        ]); 
        
    }
    
 
}
