<?php foreach($categories as $c): ?>
<div style="border: 1px solid red">
    <h2><?=$c['category']?></h2>
    <a href="<?=route('news')?>">На новости</a>
</div>
<?php endforeach; ?>
