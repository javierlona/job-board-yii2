<?php
use yii\widgets\LinkPager;
?>
<h2 class="page-header">Categories <a class="btn btn-primary pull-right" href="/index
.php?r=category/create">Create Category</a> </h2>

<ul class="list-group">
    <?php foreach ($categories as $category) : ?>
        <li class="list-group-item">
            <a href="/index.php?r=job&category=<?php echo $category->id; ?>"><?php echo $category->name; ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<!-- Displays the pagination links -->
<?php echo LinkPager::widget(['pagination' => $pagination]);