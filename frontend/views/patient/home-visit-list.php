

<b>รายการข้อมูล</b>
<?php
$i=0;

?>
<?php foreach ($raw as $value): ?>
<?php $i=$i+1; ?>
<?php

if($i%2==0){
    $color='#6897bb';     
    $txt_color = '#000000';
}  else {   
   $color = '#f7f7f7';
   $txt_color = '#ffffff';
}

?>
<div style="color:<?=$txt_color?>;background-color: <?=$color?>;padding-top:5px;padding-bottom: 5px;padding-left: 5px;margin-top: 5px">
    <b>วันที่:<?=  $value['date_input']?>  <?=$value['time_input']?></b>
    <br>น้ำหนัก:<?=$value['weight']?>กก. ส่วนสูง:<?=$value['height']?>ซม.  
    <br>รอบเอว:<?=$value['waist']?>ซม. ความดัน:<?=$value['bps']?>/<?=$value['bpd']?>
    <br>ชีพจร:<?=$value['pulse']?> น้ำตาล:<?=$value['sugar']?>
    <br>-<?=$value['note1']?>
</div>


<?php endforeach; ?>


