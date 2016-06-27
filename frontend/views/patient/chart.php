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

        <div id="container">

        </div>

        <?php
        $data = [];
        $data[] = [
            'name' => 'A',
            'data' => [10]
        ];
        $data[] = [
            'name' => 'B',
            'data' => [20]
        ];
        $data = json_encode($data);

        $js = <<<JS
        
   $(function () {
    $('#container').highcharts({
        chart:{  type:'column', animation: false},
        credits: {   enabled: false },
        title: {
            text: 'ภาษาไทย',
            x: -20 //center
        },
        plotOptions: {
            series: {
                animation: false
            }
        },        
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        
        series: $data
    });
});
        
JS;
        $this->registerJs($js);
        ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

