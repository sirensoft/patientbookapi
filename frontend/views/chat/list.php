<style>
    hr {
    border: none;
    border-top: 1px dotted black;
  }
</style>
<?php
$i=0;
?>
<?php foreach ($raw as $value) : ?>
<?php
$i++;
if($i%2==0){
$color = "#faebd7";
}else{
$color = "#c6e2ff";
}
?>
<div style="text-align:left;margin-bottom: 10px;padding: 5px;background-color: <?=$color?>">
    <span style="color:gray"><?=$value['send_date']?></span>:&nbsp;
    <b><?=$value['chat_text']?></b>
    <hr>
    <div style="text-align:left;">
        <?=  empty($value['chat_answer'])?'&nbsp;':'หมอ: '.$value['chat_answer']?>
    </div>
</div>
<?php endforeach; ?>

