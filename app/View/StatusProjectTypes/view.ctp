<div class="statusProjectTypes view">
<h2><?php echo __('Status Project Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($statusProjectType['StatusProjectType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lead'); ?></dt>
		<dd>
			<?php echo $this->Html->link($statusProjectType['Lead']['title'], array('controller' => 'leads', 'action' => 'view', $statusProjectType['Lead']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Id'); ?></dt>
		<dd>
			<?php echo h($statusProjectType['StatusProjectType']['status_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($statusProjectType['StatusProjectType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($statusProjectType['StatusProjectType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Status Project Type'), array('action' => 'edit', $statusProjectType['StatusProjectType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Status Project Type'), array('action' => 'delete', $statusProjectType['StatusProjectType']['id']), array(), __('Are you sure you want to delete # %s?', $statusProjectType['StatusProjectType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Status Project Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status Project Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leads'), array('controller' => 'leads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lead'), array('controller' => 'leads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sources'), array('controller' => 'sources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source'), array('controller' => 'sources', 'action' => 'add')); ?> </li>
	</ul>
</div>
