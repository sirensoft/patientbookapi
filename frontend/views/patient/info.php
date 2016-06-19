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
         ['attribute'=>'person_disease','label'=>'ผู้ป่วย'],
        ['attribute'=>'fullname','label'=>'ชื่อ-สกุล'],
        ['attribute'=>'cid','label'=>'เลข13หลัก'], 
        ['attribute'=>'drugallergy','label'=>'แพ้ยา'],
        ['attribute'=>'birthday','label'=>'เกิด'],
        ['attribute'=>'sex','label'=>'เพศ'],
        ['attribute'=>'bloodgrp','label'=>'หมู่เลือด'],
         ['attribute'=>'marrystatus','label'=>'สถานภาพ'],
         ['attribute'=>'occupation','label'=>'อาชีพ'],
         ['attribute'=>'sex','label'=>'เพศ'],
        ['attribute'=>'weight','label'=>'หนัก(กก)'],
        ['attribute'=>'height','label'=>'สูง(ซม)'],
        ['attribute'=>'private_doctor_name','label'=>'หมอ'],
        ['attribute'=>'volunteer','label'=>'อสม.'],
       
        
        
        
        
    ]
]);