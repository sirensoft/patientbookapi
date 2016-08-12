<style>
    .address{
        color: #4b4be7
    }
</style>

<?php
$data = $raw[0];
?>
<div class="content">
    <h1 class="address">
        <?=$data['hospname']?>
        
    </h1>
    <h4 class="address">
        <?=$data['address']?>
    </h4>
    <h2 class="address">
        <?=$data['phone']?>
    </h2>
    
</div>

