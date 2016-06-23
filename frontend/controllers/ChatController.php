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
        $sql = " SELECT * FROM chat t
WHERE t.patient_cid = '$cid'
ORDER BY id ASC ";
         $array = $this->query_all($sql);
        $this->jsonHead();
        return $array;
    }

}
