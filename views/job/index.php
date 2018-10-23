<?php
use yii\widgets\LinkPager;
?>
    <h2 class="page-header">Jobs <a class="btn btn-primary pull-right" href="/index
.php?r=job/create">Create Job</a> </h2>

<?php if (!empty($jobs)) : ?>
    <ul class="list-group">
        <?php foreach ($jobs as $job) : ?>
            <?php
            $phpdate = strtotime(($job->create_date));
            $formatted_date = date("F j, Y, g:i a", $phpdate);
            ?>
            <li class="list-group-item"><a href="/index.php?r=job/details&id=<?php echo $job->id;
                ?>"><?php echo $job->title; ?></a> - <strong><?php echo $job->city . " " .
                        $job->state . " </strong> - " . $formatted_date; ?></li>
        <?php endforeach; ?>
    </ul>

<?php else : ?>

    <p>No Jobs To List</p>

<?php endif; ?>


<?php LinkPager::widget(['pagination' => $pagination]);