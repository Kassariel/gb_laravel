<?php foreach ($catList as $cat): ?>
<div class="categories">


    <h3>Категория: <a href="<?=route('cat.show', ['idi' => $cat['id']])?>"><?=$cat['category']?></a></h3>

</div>
<hr>
<?php endforeach; ?>