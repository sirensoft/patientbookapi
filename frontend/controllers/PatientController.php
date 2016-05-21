<?php

namespace frontend\controllers;

class PatientController extends \yii\web\Controller
{
    public function actionIndex($cid=NULL)
    {
        return $this->render('index',[
            'cid'=>$cid
        ]);
    }

}
