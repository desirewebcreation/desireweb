<div class="clientTypes form">
<?php echo $this->Form->create('ClientType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Client Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ClientType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ClientType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Client Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
