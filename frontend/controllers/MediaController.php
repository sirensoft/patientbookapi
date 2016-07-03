<?php

namespace frontend\controllers;
use yii\web\Response;

class MediaController extends \yii\web\Controller {

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

    protected function send_notification($tokens, $message) {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = [
            //'registration_ids' => $tokens_array,
             
            'to' => $tokens,
            'priority' => 'high',
            'notification' => [
                'body' => $message,
                'title' => 'หมอแจ้งเตือน',
                'click_action'=>'OPEN_ACTIVITY_1'
              
            ],
            'data' => [
                'id' => "UTEHN",
                'desc' => $message
            ]
        ];
        $headers = array(
            'Authorization:key = AIzaSyD11ZHNAELUU_oemy5qYcbzWHQQO9kMphY',
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

    public function actionPush() {
        //$tokens = $token;
        $token = \Yii::$app->request->post('token');
        $msg = \Yii::$app->request->post('msg');
        $push_status = $this->send_notification($token, $msg);
        return $push_status;
    }

    public function actionUpdateToken() {
        $token = \Yii::$app->request->post('token');
        $cid = \Yii::$app->request->post('cid');
        //$key_id = \Yii::$app->request->post('key_id');
        $sql = " UPDATE patient t SET t.token = '$token' WHERE t.cid = '$cid'  and t.active='1' ";
        return $this->exec_sql($sql);
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionCheckMedia($cid = "") {
        
        
        $sql = " SELECT count(t.cid) FROM patient_media t WHERE t.cid ='$cid' AND t.media_read = 0 ";
        return \Yii::$app->db->createCommand($sql)->queryScalar();
    }
    
    public function actionListMedia($cid=""){
        //$cid = \Yii::$app->request->post('cid');
        $sql = " SELECT p.*,m.media_name,m.media_type,m.media_url FROM patient_media p
LEFT JOIN media m on m.media_id = p.media_id
WHERE p.cid = '$cid'
ORDER BY p.media_read asc,p.datetime_send DESC "   ;    
        
        $array = $this->query_all($sql);
        $this->jsonHead();
        return $array;
        
    }
    
    public function actionRead(){
        $cid = \Yii::$app->request->post('cid');
        $mdate = \Yii::$app->request->post('mdate');
        $mid = \Yii::$app->request->post('mid');
        $sql = "UPDATE patient_media t SET t.media_read = 1 
WHERE t.cid = '$cid' and t.datetime_send = '$mdate' and t.media_id = '$mid'";
        return $this->exec_sql($sql);
        
    }

}
