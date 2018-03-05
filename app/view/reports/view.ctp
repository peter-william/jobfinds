<h1>Title : <?php echo h($Report['Report']['title']); ?></h1>
<p><small>ID: <?php echo $Report['Report']['id']; ?></small></p>
<p><small>Description: <?php echo $Report['Report']['description']; ?></small></p>
<p><small>Created: <?php echo $Report['Report']['created']; ?></small></p>
<p><small>File Name:</small><?php echo h($Report['Report']['report']); ?></p>
<p><?php echo $this->Html->link('View File',array('controller' => 'reports','action' => 'viewdown',$Report['Report']['id'],false),array('target'=>'_blank'));?></p>

