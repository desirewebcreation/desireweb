<div class="container">
<div class="col-lg-9"><?php
echo $this->Form->create('Status', array(
'class' => 'form-horizontal',
'role' => 'form',
'type' => 'file',
'id'=>'Client',
));

?>
<div class="statuses form">
<div class="row meeting-tittle">
<div class="col-lg-12 col-sm-12"><h3><?php echo __('Edit Status'); ?></h3> </div> </div>
<?php //echo $this->Form->create('Status'); ?>
	<fieldset>
		<legend><?php //echo __('Edit Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description',array('type'=>'text','class'=>'form-control','placeholder'=>'Description','label'=>false));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Update')); ?>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Status.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Status.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?></li>
	</ul>
</div>
<?php */?>
</div></div>