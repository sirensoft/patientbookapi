<?php
foreach ($raw as $value){}
?>

<table width="100%">
    <thead>
    <th colspan="2"><h4>วันที่รับยาล่าสุด : <?=$value['date_serv']?></h4></th>
</thead>

<tbody>
   
    <?php foreach ($raw as $value): ?>
    <?php
        $color ='#d3ffce';
    ?>
        <tr bgcolor="<?=$color?>">
            <td>ขื่อยา: </td> 
            <td><?= $value['drugname'] ?></td>            
        </tr>
       
    <?php endforeach; ?>
</tbody>

</table>

