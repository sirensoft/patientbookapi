<?php

namespace frontend\controllers;

use frontend\models\Chat;
use yii\web\Response;
//use Yii;

class ChatController extends \yii\web\Controller {

    public $enableCsrfValidation = false;
    
      protected function jsonHead() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
    }
    
     protected function query_all($sql) {
        $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        return $rawData;
    }
     protected function exec_sql($sql) {
        $affect_row = \Yii::$app->db->createCommand($sql)->execute();
        return $affect_row;
    }
    
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionPost() {
        $post = \Yii::$app->request->post();
        //print_r($data);
        //return;
        $model = new Chat();
        $model->patient_cid = $post['patient_cid'];
        $model->chat_text = $post['chat_text'];
        $model->doctor_or_patient = $post['doctor_or_patient'];
        $model->hospcode = $post['hospcode'];
        return $model->save();
    }

    public function actionGet($cid = NULL) {
        
        $sql = " UPDATE chat  t  SET t.`read` = 'yes'
WHERE (t.`read` IS NULL OR t.`read` = '')
AND t.doctor_or_patient = 'doctor'
AND t.patient_cid = '$cid'  ";
        $this->exec_sql($sql);
        
        
        $sql = " SELECT * FROM chat t
WHERE t.patient_cid = '$cid'
ORDER BY id ASC ";
         $array = $this->query_all($sql);
        $this->jsonHead();
        return $array;
    }
    
    public function actionNoRead($cid = NULL){
        $sql = " SELECT COUNT(t.id) FROM chat t 
WHERE (t.`read` IS NULL OR t.`read` = '')
AND t.doctor_or_patient = 'doctor' AND t.patient_cid = '$cid' ";
        return \Yii::$app->db->createCommand($sql)->queryScalar();
    }
    
    
    

}
