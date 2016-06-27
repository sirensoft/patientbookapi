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
                    'highcharts-more',
                    //'modules/exporting', 
                    //'themes/grid',       
                    //'highcharts-3d',
                    'modules/drilldown'
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
       

$js = <<<JS
                  
    $('#container1').highcharts({
        title: {
            text: 'ความดัน',
            x: -20 //center
        },
         plotOptions: {
            series: {
                animation: false
            }
        },
        credits: {   enabled: false },
        
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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
            data: [120, 69, 95, 145, 182, 120, 122, 105, 233, 183, 139, 96]
        }]
    });
        
     $('#container2').highcharts({
        title: {
            text: 'น้ำตาล',
            x: -20 //center
        },
       
         plotOptions: {
            series: {
                animation: false
            }
        },
        credits: {   enabled: false },
        
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'มล'
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
            name: 'น้ำตาล',
            data: [120, 69, 95, 145, 182, 120, 122, 105, 233, 183, 139, 96]
        }]
    });
        
     $('#container3').highcharts({
        title: {
            text: 'น้ำหนัก',
            x: -20 //center
        },
         plotOptions: {
            series: {
                animation: false
            }
        },
        credits: {   enabled: false },
        
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'กก'
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
            name: 'น้ำหนักตัว',
            data: [120, 69, 95, 145, 182, 120, 122, 105, 233, 183, 139, 96]
        }]
    });

        
JS;
        $this->registerJs($js);
        ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

