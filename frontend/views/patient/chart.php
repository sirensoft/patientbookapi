<?php

//use frontend\assets\AppAsset;
use miloschuman\highcharts\Highcharts;

//AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">    

        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>



        <div style="display: none">

            <?php
            echo Highcharts::widget([
                'scripts' => [
                    //'highcharts-more',
                    //'modules/exporting', 
                    //'themes/grid',       
                    //'highcharts-3d',
                    //'modules/drilldown'
                ]
            ]);
            ?>

        </div>

        <div id="container1" style="background-color: orange">

        </div>
        <hr>
        <div id="container2" style="background-color: peru">

        </div>
        <hr>
        <div id="container3" style="background-color: khaki">

        </div>

        <?php
 //ความดัน
 $sql = " SELECT * FROM (
	SELECT t.date_input,t.time_input,t.bps,t.bpd FROM patient_input t
	WHERE (t.date_input IS NOT NULL  or trim(t.date_input) <>'')
	AND (t.bps IS NOT NULL AND trim(t.bps) <> '')
	and t.cid = '$cid'
	GROUP BY t.date_input,t.time_input
	ORDER BY  t.date_input DESC,t.time_input DESC LIMIT 12
) t  GROUP BY t.date_input ";
 
  $raw = \Yii::$app->db->createCommand($sql)->queryAll();
 $bp = [];
 $cat_bp=[];
 foreach ($raw as $value) {
    $bp[]= $value['bps']*1; 
    $cat_bp[]=$value['date_input'];
 }
 $bp = json_encode($bp);
 $cat_bp=  json_encode($cat_bp);
 
 //น้ำตาล 
 $sql = " SELECT * FROM (
	SELECT t.date_input,t.time_input,t.sugar FROM patient_input t
	WHERE (t.date_input IS NOT NULL  or trim(t.date_input) <>'')
	AND (t.sugar IS NOT NULL AND trim(t.sugar) <> '')
	and t.cid = '$cid'
	GROUP BY t.date_input,t.time_input
	ORDER BY  t.date_input DESC,t.time_input DESC LIMIT 12
) t  GROUP BY t.date_input ";
 
 $raw = \Yii::$app->db->createCommand($sql)->queryAll();
 $sugar = [];
 $cat_sugar=[];
 foreach ($raw as $value) {
    $sugar[]= $value['sugar']*1; 
    $cat_sugar[]=$value['date_input'];
 }
 $sugar = json_encode($sugar);
 $cat_sugar=  json_encode($cat_sugar);
 
 //นำหนัก 
 $sql = " SELECT * FROM (
	SELECT t.date_input,t.time_input,t.weight FROM patient_input t
	WHERE (t.date_input IS NOT NULL  or trim(t.date_input) <>'')
	AND (t.weight IS NOT NULL AND trim(t.weight) <> '')
	and t.cid = '$cid'
	GROUP BY t.date_input,t.time_input
	ORDER BY  t.date_input DESC,t.time_input DESC LIMIT 10
) t  GROUP BY t.date_input ";
 
  $raw = \Yii::$app->db->createCommand($sql)->queryAll();
 $w = [];
 $cat_w=[];
 foreach ($raw as $value) {
    $w[]= $value['weight']*1; 
    $cat_w[]=$value['date_input'];
 }
 $w = json_encode($w);
 $cat_w=  json_encode($cat_w);

        
$js = <<<JS
                  
    $('#container1').highcharts({
        title: {
            text: 'ความดัน',
            x: -20 //center
        },
        colors:['#0000ff'],
         plotOptions: {
            series: {
                animation: false
            }
        },
        credits: {   enabled: false },
        
        xAxis: {
            categories: $cat_bp
        },
        yAxis: {
            title: {
                text: 'มม.ปรอท'
            },
            plotLines: [{
                value:140,
                color: '#ff0000',
                width:2,
                zIndex:4,
                label:{text:'ไม่เกิน 140'}
            }]
        },
        
        series: [{
            showInLegend: false,
            name: 'ความดัน',
            data: $bp
        }]
    });
        
     $('#container2').highcharts({
        title: {
            text: 'น้ำตาล',
            x: -20 //center
        },
         colors:['#ff0000'],
       
         plotOptions: {
            series: {
                animation: false
            }
        },
        credits: {   enabled: false },
        
        xAxis: {
            categories: $cat_sugar
        },
        yAxis: {
            title: {
                text: 'มล'
            },
            plotLines: [{
                value:110,
                color: '#ff0000',
                width:2,
                zIndex:4,
                label:{text:'ไม่เกิน 110'}
            }]
        },
        
        series: [{
            showInLegend: false,
            name: 'น้ำตาล',
            data: $sugar
        }]
    });
        
     $('#container3').highcharts({
        title: {
            text: 'น้ำหนัก',
            x: -20 //center
        },
         colors:['#6dc066'],
         plotOptions: {
            series: {
                animation: false
            }
        },
        credits: {   enabled: false },
        
        xAxis: {
            categories: $cat_w
        },
        yAxis: {
            title: {
                text: 'กิโลกรัม'
            },
            plotLines: [{
                value:140,
                color: '#ff0000',
                width:2,
                zIndex:4,
                //label:{text:'ไม่เกิน 140'}
            }]
        },
        
        series: [{
            showInLegend: false,
            name: 'หนัก',
            data: $w
        }]
    });

        
JS;
        $this->registerJs($js);
        ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

