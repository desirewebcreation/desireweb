<div class="statusProjectTypes index">
	<h2><?php echo __('Status Project Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('lead_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($statusProjectTypes as $statusProjectType): ?>
	<tr>
		<td><?php echo h($statusProjectType['StatusProjectType']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($statusProjectType['Lead']['title'], array('controller' => 'leads', 'action' => 'view', $statusProjectType['Lead']['id'])); ?>
		</td>
		<td><?php echo h($statusProjectType['StatusProjectType']['status_id']); ?>&nbsp;</td>
		<td><?php echo h($statusProjectType['StatusProjectType']['created']); ?>&nbsp;</td>
		<td><?php echo h($statusProjectType['StatusProjectType']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $statusProjectType['StatusProjectType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $statusProjectType['StatusProjectType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $statusProjectType['StatusProjectType']['id']), array(), __('Are you sure you want to delete # %s?', $statusProjectType['StatusProjectType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Status Project Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Leads'), array('controller' => 'leads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lead'), array('controller' => 'leads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sources'), array('controller' => 'sources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source'), array('controller' => 'sources', 'action' => 'add')); ?> </li>
	</ul>
</div>
