<?php

namespace common\components;

use Yii;

class AppController extends \yii\web\Controller {

    public function init() {
        parent::init();
    }
    
    protected function doLogin(){
        if (\Yii::$app->user->isGuest) {
            $this->redirect(['site/login']);           
        }
    }

    
    protected function getRole(){
        if (!\Yii::$app->user->isGuest) {
             return \Yii::$app->user->identity->role;
         }  else {
             return "?";            
         }
    }

    public function permitRole($role=[]){ 
        
        $r = $this->getRole();   
        if(empty($role)){
             throw  new \yii\web\ForbiddenHttpException("ไม่ได้รับอนุญาต");
             
        }
        if( !in_array($r,$role)){
            throw  new \yii\web\ForbiddenHttpException("ไม่ได้รับอนุญาต");
        }         
        
    }
    
    public function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	}


}
