<?php

namespace frontend\controllers;

class MediaController extends \yii\web\Controller {

    protected function send_notification($tokens, $message) {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = [
            'registration_ids' => $tokens,
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

    public function actionPush($msg = null) {
        $tokens = ['ezEt6MNeOoc:APA91bGPTt9hZQlVPr6OsR6BYKNjiSrOg376whVQ0KsDxbUKvdumIZ8o8QhYNbh4mvPWSe86u9QoIaiG3cjfTuua-8tsI9qgyRnJFfpz0w_nkoZ92wM1TGWS1K5R5MIz1ewR4192qxAZ', 'e_6hCIkfcqA:APA91bEZdYI1SpRdnnyXqiaYR6ur9P6UErZxFwBRaB1BnrKQbbnXhdqztT2JYAcFZ9YSq7MbNDs5b9TQQZIUcooOCN0-UVK6hdjz8kEjIukqhQA3jVm9HrcQuXJHI_zN7a1DBkXYIP4T'];

        $message = "ทาอาหารให้ตรงเวลา";


        $push_status = $this->send_notification($tokens, $msg);
        return $push_status;
    }

    public function actionIndex() {
        return $this->render('index');
    }

}
