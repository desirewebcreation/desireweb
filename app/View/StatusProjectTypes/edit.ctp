<div class="statusProjectTypes form">
<?php echo $this->Form->create('StatusProjectType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Status Project Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lead_id');
		echo $this->Form->input('status_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StatusProjectType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('StatusProjectType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Status Project Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Leads'), array('controller' => 'leads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lead'), array('controller' => 'leads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sources'), array('controller' => 'sources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source'), array('controller' => 'sources', 'action' => 'add')); ?> </li>
	</ul>
</div>
