

<b>รายการข้อมูล</b>
<?php foreach ($raw as $value): ?>

<div style="background-color: skyblue;padding-top:  5px;padding-bottom: 5px;margin-top: 5px">
    <?=  $value['date_input']?>  <?=$value['time_input']?><br>
    น้ำหนัก:<?=$value['weight']?>กก. ส่วนสูง:<?=$value['height']?>ซม.  รอบเอว:<?=$value['waist']?>ซม.
</div>


<?php endforeach; ?>


