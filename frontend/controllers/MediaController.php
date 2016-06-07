<?php

namespace frontend\controllers;

class MediaController extends \yii\web\Controller {
    
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

    protected function send_notification($tokens, $message) {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = [
            //'registration_ids' => $tokens,
            'to' => $tokens,
            'priority' => 'normal',
            'notification' => [
                'body' => $message,
                'title' => 'หมอแจ้งเตือน'
            ],
            'data' => [
                'Nick' => "Mario",
                'Room' => "PortugalVSDenmark"
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
    
    public function actionUpdateToken($cid=null,$token=null){
        
        $sql = " UPDATE patient t SET t.token = '$token' WHERE t.cid = '$cid' ";
        $this->exec_sql($sql);
                
    }

    public function actionIndex() {
        return $this->render('index');
    }

}
