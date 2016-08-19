<?php

/* @var $this yii\web\View */
use yii\db\Exception;

$this->title = 'API TEST';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>HTTP... OK</h1>

       
    </div>

    <div class="body-content" >
        <font color="red">
        <?php
        try{
            \Yii::$app->db->open();
        }  catch (yii\db\Exception $e){
            echo $e->getMessage();
        }        
        
        ?>
        </font>

    </div>
</div>
