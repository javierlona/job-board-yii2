<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
//use yii\data\Pagination;
?>
<h2 class="page-header">Categories <a class="btn btn-primary pull-right" href="/index
.php?r=category/create">Create Category</a> </h2>

<ul class="list-group">
    <?php foreach ($categories as $category) : ?>
        <li class="list-group-item"><a href="/index.php?r=job&category=<?php echo $category->id; ?>"><?php echo $category->name; ?></a></li>
    <?php endforeach; ?>
</ul>

<?php LinkPager::widget(['pagination' => $pagination]);