<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('Action', array(
'class' => 'form-horizontal',
'role' => 'form',
'type' => 'file',
'id'=>'LeadAction',
));

?>
<div class="sources form">
<div class="row meeting-tittle">
<div class="col-lg-12 col-sm-12"><h3><?php echo __('Edit Action'); ?></h3> </div> </div>
<?php //echo $this->Form->create('Source'); ?>
	<fieldset>
		<legend><?php //echo __('Edit Source'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title',array('type'=>'text','class'=>'form-control','placeholder'=>'Description','label'=>false));
		echo $this->Form->select('type',array(
				'Client'=>'Client','Follow Up'=>'Follow up','Nibiru'=>'Nibiru'),array('empty' => '(choose one)','class'=>'form-control','rows'=>'3','label'=>false));
		echo $this->Form->text('closing_action',array('type'=>'text','class'=>'form-control required','rows'=>'3','placeholder'=>'Closing Action','label'=>false));
		
		?>
	
	
	</fieldset>
<?php echo $this->Form->end(__('Update')); ?>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Source.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Source.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sources'), array('action' => 'index')); ?></li>
	</ul>
</div><?php */?>
</div></div>
