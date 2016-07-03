

<table width="100%">
    <thead>
    <th>วันที่ตรวจ</th><th>การตรวจ</th><th>ผลตรวจ</th>
</thead>

<tbody>
    <?php $i = 0; ?>
    <?php foreach ($raw as $value): ?>
    <?php
        $color = $i%2==0?'#ffe4e1':'#d3ffce';
    ?>
        <tr bgcolor="<?=$color?>">
            <td><?= $value['date_serv'] ?></td>
            <td><?= $value['labname'] ?></td>
            <td><?= $value['labresult'] ?></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</tbody>

</table>

