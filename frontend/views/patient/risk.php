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
    
    <tr><td colspan="3"><strong><u>ความเสี่ยง</u></strong></td></tr>
    
    <tr>
        <td colspan="3">คุมเบาหวาน</td>
        
    </tr>
    <tr>
        <td colspan="3" bgcolor="#<?=$data['dm_color']?>" style="color: white"><h4><?=$data['dm_text']?></h4> </td>
    </tr>
    
     <tr>
         <td colspan="3">คุมความดัน</td>
        
    </tr>
    <tr>
        <td colspan="3" bgcolor="#<?=$data['ht_color']?>" style="color: white"><h4><?=$data['ht_text']?></h4></td>
    </tr>
    
    
     <tr>
         <td colspan="3">โรคไต</td>        
    </tr>
    <tr>
        <td colspan="3" bgcolor="#<?=$data['ckd_color']?>" ><h4><?=$data['ckd_text']?></h4></td>
    </tr>
    
     <tr>
         <td colspan="3">โรคหลอดเลือดหัวใจ</td>
        
    </tr>
    <tr>
        <td colspan="3" bgcolor="#<?=$data['cvd_color']?>" style="color: white"><h4><?=$data['cvd_text']?></h4></td>
    </tr>
    
    
</table>

