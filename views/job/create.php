<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $job app\models\Job */
/* @var $form ActiveForm */
?>
<div class="job-create">
<h2 class="page-header">Create Job</h2>
    <?php $form = ActiveForm::begin(); ?>
    <?php include('form_fields.php'); ?>
    <?php ActiveForm::end(); ?>
</div><!-- job-create -->
