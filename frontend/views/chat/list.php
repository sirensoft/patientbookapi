<style>
    hr {
    border: none;
    border-top: 1px dotted black;
  }
</style>
<?php foreach ($raw as $value) : ?>
<div style="text-align:left;margin-bottom: 10px;padding: 5px;background-color: #b6fcd5">
    <span style="color:gray"><?=$value['send_date']?></span>:&nbsp;
    <b><?=$value['chat_text']?></b>
    <hr>
    <div style="text-align:left;">
        <?=  empty($value['chat_answer'])?'&nbsp;':'หมอ: '.$value['chat_answer']?>
    </div>
</div>
<?php endforeach; ?>

