<?php

use app\models\Category;
use yii\helpers\Html;

?>
<?= $form->field($job, 'category_id')
    ->dropDownList(Category::find()
        ->select(['name', 'id'])
        ->indexBy('id')
        ->orderBy(['name' => SORT_ASC])
        ->column(), ['prompt' => 'Select Category']);
?>

<?= $form->field($job, 'title') ?>
<?= $form->field($job, 'description')->textarea(['rows' => '6']) ?>
<?= $form->field($job, 'type')->dropDownList(['Full Time' => 'Full Time',
    'Part Time' => 'Part Time',
    'As Needed' => 'As Needed'],
    ['prompt' => 'Select Type'])
?>
<?= $form->field($job, 'requirements') ?>
<?= $form->field($job, 'salary_range')->dropDownList(['Under $20k' => 'Under $20k',
    '$20k - $40k' => '$20k - $40k',
    '$41k - $60k' => '$40k - $60k',
    '$61k - $80k' => '$60k - $80k',
    '$81k - 100k' => '$80k - $100k',
    '$101k - $150k' => '$101k - $150k',
    'Over $151k' => 'Over $151k'],
    ['prompt' => 'Select Salary']) ?>
<?= $form->field($job, 'city') ?>
<?= $form->field($job, 'state') ?>
<?= $form->field($job, 'zipcode') ?>
<?= $form->field($job, 'contact_email') ?>
<?= $form->field($job, 'contact_phone') ?>
<?= $form->field($job, 'is_published')->radioList(array('1' => 'Yes', '0' => 'No')) ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>