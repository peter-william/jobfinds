<div class="user form">
<?php echo $this->Form->create('User'); ?>
<fieldset>
<legend>
<?php echo __('Please enter your username and password'); ?>

</legend>

<?php echo $this->Form->input('username');

echo $this->Form->input('password');

?>
</fieldset>
<?php echo $this->Form->end('login'); ?>

<?php echo $this->Html->link("Forget Password ?",array("controller"=>"users","action"=>"forgetpwd")); ?>

</div>