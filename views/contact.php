<?php 
use systemx\systemx\DbModel;
use systemx\systemx\form\Form;
use systemx\systemx\form\TextareaField;

$this->title='contact';
?>
<h1>Create an account</h1>
<?php $form = Form::begin('', 'post') ?>


<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body') ?>


 <button class="btn btn-primary">Submit</button>

<?php echo Form::end()?>

