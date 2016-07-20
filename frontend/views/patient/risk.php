<style>
    .content {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
</style>

<?php
$level = [4,5];

$dm_color = in_array($data['dm_level'],$level)?'white':'black';
$ht_color = in_array($data['ht_level'],$level)?'white':'black';
$ckd_color = in_array($data['ckd_level'],$level)?'white':'black';
$cvd_color = in_array($data['cvd_level'],$level)?'white':'black';
?>
<div class="content">
<strong>ข้อมูล ณ วันที่ <?= $data['last_update'] ?></strong>
<table width="100%">

    <tr><td colspan="3"><strong><u>สถานะความเสี่ยงปัจจุบัน</u></strong></td></tr>

    <tr>
        <td colspan="3">เบาหวาน</td>

    </tr>
    <tr>
        <td colspan="3" bgcolor="<?= $data['dm_color'] ?>" style="color: <?=$dm_color?>"><h4><?= $data['dm_text'] ?></h4> </td>
    </tr>

    <tr>
        <td colspan="3">ความดัน</td>

    </tr>
    <tr>
        <td colspan="3" bgcolor="<?= $data['ht_color'] ?>" style="color: <?=$ht_color?>"><h4><?= $data['ht_text'] ?></h4></td>
    </tr>


    <tr>
        <td colspan="3">โรคไต</td>        
    </tr>
    <tr>
        <td colspan="3" bgcolor="<?= $data['ckd_color'] ?>" style="color: <?=$ckd_color?>" ><h4><?= $data['ckd_text'] ?></h4></td>
    </tr>

    <tr>
        <td colspan="3">โรคหลอดเลือดหัวใจ</td>

    </tr>
    <tr>
        <td colspan="3" bgcolor="<?= $data['cvd_color'] ?>" style="color: <?=$cvd_color?>"><h4><?= $data['cvd_text'] ?></h4></td>
    </tr>
</table>
<br>
<strong>ข้อมูลเบื้องต้น</strong>
<table width="100%">
    <tr>
        <td>ผู้ป่วย</td>
        <td colspan="2"><?= $data['person_disease'] ?></td>
    </tr>
    <tr>
        <td>หนัก(กก)</td>
        <td>สูง(ซม)</td>
        <td>เอว(ซม)</td>

    </tr>
    <tr>
        <td><?= $data['weight'] ?></td>
        <td ><?= $data['height'] ?> </td>
        <td><?= $data['waist'] ?> </td>
    </tr>

    <tr>
        <td>ดัชนีมวลกาย</td>
        <td ><?= $data['bmi'] ?></td>
        <td ><?= $data['bmi_text'] ?></td>
    </tr>
    <tr>
        <td colspan="2">ความดัน :<?= $data['bps'] ?>/<?= $data['bpd'] ?></td>
        <td > ชีพจร : <?= $data['pulse'] ?></td>

    </tr>
    <tr><td colspan="3"><strong><u>ตรวจ ตา ไต เท้า ครั้งล่าสุด</u></strong></td></tr>
    <tr>
        <td colspan="3">ตา:<?= $data['eye'] ?></td>
    </tr>
    <tr>
        <td colspan="3">ไต:<?= $data['kidney'] ?></td>
    </tr>
    <tr>
        <td colspan="3">เท้า:<?= $data['foot'] ?></td>
    </tr>




</table>
</div>

