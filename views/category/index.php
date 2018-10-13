<?php
use yii\helpers\Html;
use yii\Widgets\LinkPager;
?>
<h2 class="page-header">Categories</h2>

<ul class="list-group">
    <?php foreach ($categories as $category) : ?>
        <li class="list-group-item"><?php echo $category->name; ?></li>
    <?php endforeach; ?>
</ul>
