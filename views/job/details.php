<a href="/index.php?r=job">Back to Jobs</a>
<h2 class="page-header"><?php echo $job->title; ?><small> in <?php echo $job->city . ', ' .
            $job->state;
?></small>
    <?php if((Yii::$app->user->id == $job->user_id)) : ?>
    <span class="pull-right">
        <a class="btn btn-default" href="index.php?r=job/edit&id=<?php echo $job->id; ?>">Edit</a>
        <a class="btn btn-danger" href="index.php?r=job/delete&id=<?php echo $job->id; ?>">Delete</a>
    </span>
    <?php endif; ?>
</h2>


<div class="well">
    <h4>Job Description</h4>
    <?php echo $job->description; ?>
    <p><br>
        <strong>Listing Created:
            <?php
                $phpdate = strtotime(($job->create_date));
                $formatted_date = date("F j, Y, g:i a", $phpdate);
                echo $formatted_date;
            ?>
        </strong>
    </p>
</div>
<ul class="list-group">
    <li class="list-group-item">
        <strong>Category:</strong> <?php echo $job->category->name; ?>
    </li>
    <li class="list-group-item">
        <strong>Employment Type:</strong> <?php echo $job->type; ?>
    </li>
    <li class="list-group-item">
        <strong>Salary Range:</strong> <?php echo $job->salary_range; ?>
    </li>
    <li class="list-group-item">
        <strong>Requirements:</strong> <?php echo $job->requirements; ?>
    </li>
    <li class="list-group-item">
        <strong>Contact Email:</strong> <?php echo $job->contact_email; ?>
    </li>
    <li class="list-group-item">
        <strong>Contact Phone:</strong> <?php echo $job->contact_phone; ?>
    </li>
</ul>
<a class="btn btn-primary" href="mailto:<?php echo $job->contact_email;
?>?Subject=Job%20Application">Contact
    Employer</a>