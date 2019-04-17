<div class="portfolioLinks form">
<?php echo $this->Form->create('PortfolioLink'); ?>
	<fieldset>
		<legend><?php echo __('Edit Portfolio Link'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('tags');
		echo $this->Form->input('tools_used');
		echo $this->Form->input('for');
		echo $this->Form->input('live_status');
		echo $this->Form->input('work_type');
		echo $this->Form->input('url');
		echo $this->Form->input('currencies_id');
		echo $this->Form->input('price');
		echo $this->Form->input('countries_id');
		echo $this->Form->input('clients_id');
		echo $this->Form->input('nibiru_rating');
		echo $this->Form->input('is_responsive');
		echo $this->Form->input('live_on');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PortfolioLink.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('PortfolioLink.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Portfolio Links'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Currencies'), array('controller' => 'currencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Currencies'), array('controller' => 'currencies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Countries'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clients'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
