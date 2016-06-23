<?php
use kartik\detail\DetailView;
//var_dump($model);

//exit();
echo DetailView::widget([
    'model'=>$model,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    
    'attributes'=>[
         //['attribute'=>'person_disease','label'=>'ผู้ป่วย'],
        ['attribute'=>'fullname','label'=>'ชื่อ-สกุล'],
         ['attribute'=>'sex','label'=>'เพศ'],
        ['attribute'=>'cid','label'=>'บัตร ปชช.'], 
        ['attribute'=>'drugallergy','label'=>'แพ้ยา'],
        ['attribute'=>'birthday','label'=>'เกิด'],
       
        ['attribute'=>'bloodgrp','label'=>'หมู่เลือด'],
         ['attribute'=>'marrystatus','label'=>'สถานภาพ'],
         ['attribute'=>'occupation','label'=>'อาชีพ'],         
        ['attribute'=>'weight','label'=>'หนัก(กก)'],
        ['attribute'=>'height','label'=>'สูง(ซม)'],
        
        ['attribute'=>'private_doctor_name','label'=>'หมอประจำ'],
        ['attribute'=>'volunteer','label'=>'อสม.ดูแล'],
       
        
        
        
        
    ]
]);