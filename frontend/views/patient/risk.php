<strong>ข้อมูล ณ วันที่ <?=$data['last_update']?></strong>
<table width="100%">
    <tr>
        <td>ผู้ป่วย</td>
        <td bgcolor="red" colspan="2" style="color: white" ><?=$data['person_disease']?></td>
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
        <td bgcolor="#<?=$data['bmi_color']?>"><?=$data['bmi_text']?></td>
    </tr>
    <tr><td colspan="3"><strong>ความเสี่ยง</strong></td></tr>
    
    <tr>
        <td>คุมเบาหวาน</td>
        <td colspan="2" bgcolor="#<?=$data['dm_color']?>"><?=$data['dm_text']?></td>
    </tr>
     <tr>
        <td>คุมความดัน</td>
        <td colspan="2" bgcolor="#<?=$data['ht_color']?>"><?=$data['ht_text']?></td>
    </tr>
    
     <tr>
        <td>โรคไต</td>
        <td colspan="2" bgcolor="#<?=$data['ckd_color']?>"><?=$data['ckd_text']?></td>
    </tr>
    
     <tr>
        <td>โรคหลอดเลือดสมอง</td>
        <td colspan="2" bgcolor="#<?=$data['cvd_color']?>"><?=$data['cvd_text']?></td>
    </tr>
    
    
</table>

