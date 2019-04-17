<div class="portfolioLinks index">
	<h2><?php echo __('Portfolio Links'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('tags'); ?></th>
			<th><?php echo $this->Paginator->sort('tools_used'); ?></th>
			<th><?php echo $this->Paginator->sort('for'); ?></th>
			<th><?php echo $this->Paginator->sort('live_status'); ?></th>
			<th><?php echo $this->Paginator->sort('work_type'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('currencies_id'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('countries_id'); ?></th>
			<th><?php echo $this->Paginator->sort('clients_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nibiru_rating'); ?></th>
			<th><?php echo $this->Paginator->sort('is_responsive'); ?></th>
			<th><?php echo $this->Paginator->sort('live_on'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
            
	<?php foreach ($portfolioLinks as $portfolioLink): ?>
	<tr class="border">
		<td><?php echo h($portfolioLink['PortfolioLink']['id']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['title']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['description']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['tags']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['tools_used']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['for']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['live_status']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['work_type']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['url']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($portfolioLink['Currency']['name'], array('controller' => 'currencies', 'action' => 'view', $portfolioLink['Currency']['id'])); ?>
		</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['price']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($portfolioLink['Country']['name'], array('controller' => 'countries', 'action' => 'view', $portfolioLink['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($portfolioLink['Client']['company_name'], array('controller' => 'clients', 'action' => 'view', $portfolioLink['Client']['company_name'])); ?>
		</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['nibiru_rating']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['is_responsive']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['live_on']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['created']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['PortfolioLink']['modified']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['Createdby']['name']); ?>&nbsp;</td>
		<td><?php echo h($portfolioLink['Modifiedby']['name']); ?>&nbsp;</td>
		<td class="actions1">
			<?php echo $this->Html->link(__(''), array('action' => 'view', $portfolioLink['PortfolioLink']['id'])); ?>
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $portfolioLink['PortfolioLink']['id'])); ?>
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $portfolioLink['PortfolioLink']['id']), array(), __('Are you sure you want to delete # %s?', $portfolioLink['PortfolioLink']['id'])); ?>
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

