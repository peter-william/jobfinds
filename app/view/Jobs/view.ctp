
<form id="Apply_Now_link" action="<?php echo $this->webroot;?>reports/add">
<button <?php echo ($this->here== '/jobfinds/reports/add')? 'class="current"' : ' '?>><a href="<?php echo $this->webroot; ?>reports/add"></a>Apply Now</button>

<?php echo $this->Html->link("Forgot Password",['controller'=>'Users','action'=>'forgotPassword']);?>


</form>
<h3><?php echo $job['Job']['title']; ?></h3>
<li><strong>Location :</strong> <?php echo $job['Job']['city']; ?>,<?php echo $job['Job']['state']; ?></li>
<li><strong>Job Type :</strong> <?php echo $job['Type']['name']; ?></li>
<li><strong>Company Description:</strong> <?php echo $job['Job']['description']; ?>


<p><a href="<?php echo $this->webroot; ?>jobs/browse">Back To Jobs</a></p>

<?php if($userData['id']==$job['Job']['user_id']) : ?>
<br><br>
<?php echo $this->Html->link('Edit',array('action'=>'edit',$job['Job']['id'])); ?> |
<?php echo $this->Form->postLink('Delete',array('action'=>'delete',$job['Job']['id']),array('confirm' =>'Are you sure?')); ?>

<?php endif; ?>