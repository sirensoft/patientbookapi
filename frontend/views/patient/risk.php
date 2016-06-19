<strong>ข้อมูล ณ วันที่ <?=$data['last_update']?></strong>
<table width="100%">
    <tr>
        <td>ผู้ป่วย</td>
        <td ><?=$data['person_disease']?></td>
    </tr>
    <tr>
        <td>น้ำหนัก</td>
        <td>ส่วนสูง</td>
        <td>รอบเอว</td>
        
    </tr>
     <tr>
        <td><?=$data['weight']?> กก.</td>
        <td ><?=$data['height']?> ซม.</td>
        <td><?=$data['waist']?> ซม.</td>
    </tr>
    
     <tr>
        <td>ดัชนีมวลกาย</td>
        <td ><?=$data['bmi']?></td>
        <td ><?=$data['bmi_text']?></td>
    </tr>
      <tr>
          <td colspan="2">ความดัน :<?=$data['bps']?>/<?=$data['bpd']?></td>
        <td > ชีพจร : <?=$data['pulse']?></td>
        
    </tr>
    
    <tr><td colspan="3"><strong>ความเสี่ยง</strong></td></tr>
    
    <tr>
        <td>คุมเบาหวาน</td>
        <td colspan="2" bgcolor="#<?=$data['dm_color']?>" style="color: white"><b><?=$data['dm_text']?></b> </td>
    </tr>
     <tr>
        <td>คุมความดัน</td>
        <td colspan="2" bgcolor="#<?=$data['ht_color']?>" style="color: white"><b><?=$data['ht_text']?></b></td>
    </tr>
    
     <tr>
        <td>โรคไต</td>
        <td colspan="2" bgcolor="#<?=$data['ckd_color']?>" ><b><?=$data['ckd_text']?></b></td>
    </tr>
    
     <tr>
        <td>โรคหลอดเลือดสมอง</td>
        <td colspan="2" bgcolor="#<?=$data['cvd_color']?>" style="color: white"><b><?=$data['cvd_text']?></b></td>
    </tr>
    
    
</table>

