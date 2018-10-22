<a href="/index.php?r=job">Back to Jobs</a>
<h2 class="page-header"><?php echo $job->title; ?><small> in <?php echo $job->city . ', ' .
            $job->state;
?></small>
    <span class="pull-right">
        <a class="btn btn-default" href="index.php?r=job/edit&id=<?php echo $job->id; ?>">Edit</a>
        <a class="btn btn-danger" href="index.php?r=job/delete&id=<?php echo $job->id; ?>">Delete</a>
    </span>
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
        <strong>Category: <?php echo $job->category->name; ?></strong>
    </li>
    <li class="list-group-item">
        <strong>Employment Type: <?php echo $job->type; ?></strong>
    </li>
    <li class="list-group-item">
        <strong>Salary Range: <?php echo $job->salary_range; ?></strong>
    </li>
    <li class="list-group-item">
        <strong>Contact Email: <?php echo $job->contact_email; ?></strong>
    </li>
    <li class="list-group-item">
        <strong>Contact Phone: <?php echo $job->contact_phone; ?></strong>
    </li>
</ul>
<a class="btn btn-primary" href="mailto:<?php echo $job->contact_email;
?>?Subject=Job%20Application">Contact
    Employer</a>