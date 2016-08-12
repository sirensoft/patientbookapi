<style>
    .address{
        color: #4b4be7
    }
</style>

<?php
$data = $raw[0];
?>
<div class="content">
    <h3 class="address">
        <?=$data['hospname']?>
        
    </h3>
    <h4 class="address">
        <?=$data['address']?>
    </h4>
    <h4 class="address">
        <?=$data['phone']?>
    </h4>
    
</div>

