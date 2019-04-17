<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('Status', array(
'class' => 'form-horizontal',
'role' => 'form',
'type' => 'file',
'id'=>'Status'
));

?>
<?php //echo $this->Form->create('Status'); ?>
	<fieldset>
		<legend><div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Add Status'); ?></h3></div> </div></legend>
	<?php
		echo $this->Form->input('description',array('type'=>'text','class'=>'form-control','placeholder'=>'Status'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Add')); ?>

<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?></li>
	</ul>
</div><?php */?>
</div>
</div>