<?php echo $this->Form->create('Job'); ?>
<fieldset>
<legend><?php echo __('Curriculum Vitae'); ?></legend>


<?php
 echo $this->Form->input('Title',array(
'type' =>'select',
'options'=>array('Mr' =>'Mr', 'Mrs' =>'Mrs','others'=>'others'),
'empty'=>'Select your Gender'

));

echo $this->Form->input('Name');
echo $this->Form->input('Job Title'); 
echo $this->Form->input('Adresss');
echo $this->Form->input('Mobile Number');
echo $this->Form->input('contact_email');
echo $this->Form->input('Birth Date');
 ?>
<h5>PROFILE</h5>

<?php echo $this->Form->input('Summary'); ?>


<h5>Education</h5>
<?php  
echo $this->Form->input('Starting Date'); 
echo $this->Form->input('Ending Name');  
echo $this->Form->input('Degree',array(
'type' =>'select',
'options'=>array('Bachelor Degree' =>'Bachelor Degree', 'Master Degree' =>'Master Degree','PHD'=>'PHD'),
'empty'=>'Select Degree Type'

));

echo $this->Form->input('University Name'); 
?>

<h5>Experience</h5>
<?php
echo $this->Form->input('Organization Name'); 
echo $this->Form->input('position');
echo $this->Form->input('Starting Date'); 
echo $this->Form->input('Ending Name');  
echo $this->Form->input('Short Description'); 



?>

<h5>Personality</h5>
<?php
echo $this->Form->input('pesonality'); 


?>


 
  


<h5>Skills</h5>
<?php
echo $this->Form->input('Skills'); ?>
<h5>Software Skills</h5>
<?php
echo $this->Form->input('Skills'); ?>

<h5>Awards and Certificates</h5>
<?php
echo $this->Form->input('position');
echo $this->Form->input('Starting Date'); 
echo $this->Form->input('Ending Name');  
echo $this->Form->input('Short Description'); ?>

<h5>Languages</h5>
<?php
echo $this->Form->input('language'); 


?>
<h5>Hobby</h5>
<?php
echo $this->Form->input('hobby'); 


?>
<?php
  echo $this->Form->end('Create CV');

?>

</fieldset>