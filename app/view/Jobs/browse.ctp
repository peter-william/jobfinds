<?php echo $this->element('search'); ?>
<br>
<!--browse upload button -->
  

<div id="category_block">

<ul>


<?php foreach($categories as $category) : ?>
<li styel="width:200px;
	float:left;
	padding:0 10px 0 0;">
<?php echo $this->Html->link($category['Category']['name'],array('action'=>'browse',$category['Category']['id'])); ?>
</li>
<?php endforeach; ?>
</ul>
</div>
<div class="clearfix"></div>
<br> 


<h3>Latest Job Listing</h3>
<?php if($jobs) : ?>
<ul id="listings">
<?php foreach($jobs as $job) : ?>


<li>
<div class="type">
<span style="background:<?php echo $job['Type']['color']; ?>"><?php echo $job['Type']['name']; ?></span>
</div>
<div class="description">
<h5><?php echo $job['Job']['title']; ?>(<?php echo $job['Job']['city']; ?>,<?php echo $job['Job']['state']; ?>)</h5>
<span id="list_date">
<?php echo $this->Time->format('F jS h:i A',$job['Job']['created']); ?>
</span> 
<br>
<br>

<?php echo $this->Text->truncate($job['Job']['description'],250,array('ellipsis'=>'...','exact'=>false)); ?>


<?php echo $this->Html->link('Read More',array('controller'=>'jobs','action'=>'view',$job['Job']['id'])); ?>

</div>
</li>
<?php endforeach; ?>


</ul>
<?php else: ?>
<p> Sorry, no jobs available </p>

<?php endif; ?>