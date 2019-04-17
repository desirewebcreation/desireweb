

<script>
$(document).ready(function(){

$("#datepicker" ).datepicker({
						   dateFormat: 'yy-mm-dd',
						   changeMonth: true,
						   changeYear: true,
						   
					}); 
					
					$("#datepicker1" ).datepicker({
						   dateFormat: 'yy-mm-dd',
						   changeMonth: true,
						   changeYear: true,
						   
					}); 
});
</script>

<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('Campaign', array(
'class' => 'form-horizontal',
'role' => 'form',
'type' => 'file',
'id'=>'Client',
'inputDefaults' => array(
'format' => array('before', 'label', 'between', 'input','error', 'after'),
'div' => array('class' => 'form-group col-xs-12'),
'class' => array('form-control'),
'label' => array('class' => 'col-lg-3 control-label E-chnge'),
'between' => '<div class="col-xs-12">',
'after' => '</div>',
'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
)));

?>
<?php //echo $this->Form->create('Campaign'); ?>
	<fieldset>
		<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Add Campaign'); ?></h3></div> </div></legend>
	<?php
		echo $this->Form->input('campaign_types_id');
		echo $this->Form->input('title',array('placeholder'=>'Title'));
		echo $this->Form->input('description',array('placeholder'=>'Description'));
		echo $this->Form->input('status',array('type'=>'select','options'=>$Status,'placeholder'=>'Description'));
?>
 	
         
         <?php echo $this->Form->input('start_date',array('id'=>'datepicker','type'=>'text')); ?>
     
       
          <?php echo $this->Form->input('end_date', array('id'=>'datepicker1','type'=>'text')); ?>
     		
	<?php
		//echo $this->Form->input('start_date');
		//echo $this->Form->input('end_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

<?php /*<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Campaigns'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Campaign Types'), array('controller' => 'campaign_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Types'), array('controller' => 'campaign_types', 'action' => 'add')); ?> </li>
	</ul>
</div>*/?>
</div>
</div>