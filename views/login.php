<?php 
/** @var $model\app\models\User */
use systemx\systemx\DbModel;
use systemx\systemx\form\Form;

?>
<h1>Login</h1>
<?php $form = Form::begin('', 'post') ?>

<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>

 <button class="btn btn-primary">Submit</button>

<?php echo Form::end()?>

