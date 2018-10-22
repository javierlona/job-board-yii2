<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $job app\models\Job */
/* @var $form ActiveForm */
?>
<div class="job-edit">
    <h2 class="page-header">Edit Job</h2>
    <?php $form = ActiveForm::begin(); ?>
    <?php include('form_fields.php'); ?>
    <?php ActiveForm::end(); ?>
</div><!-- job-edit -->

