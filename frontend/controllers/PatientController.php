<?php

namespace frontend\controllers;
use yii;
use yii\web\Response;

class PatientController extends \yii\web\Controller {
    
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

}
