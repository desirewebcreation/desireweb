<div class="container">
<div class="col-lg-12">
	<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Lead Project Types');  ?></h3> </div> </div>

	<table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('leads_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_types_id'); ?></th>
			
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($leadProjectTypes as $leadProjectType): ?>
	<tr class="border">
		<td class="border_right" align="center"><?php echo h($leadProjectType['LeadProjectType']['id']); ?>&nbsp;</td>
		<td class="border_right" align="center">
			<?php echo $this->Html->link($leadProjectType['Lead']['title'], array('controller' => 'leads', 'action' => 'view', $leadProjectType['Lead']['title'])); ?>
		</td>
		<td class="border_right" align="center">
			<?php echo $this->Html->link($leadProjectType['ProjectType']['description'], array('controller' => 'project_types', 'action' => 'view', $leadProjectType['ProjectType']['description'])); ?>
		</td>
		
		<td class="actions1">
			<?php echo $this->Html->link(__(''), array('action' => 'view', $leadProjectType['LeadProjectType']['id']),array('class' => 'fa fa-search fa-fw')); ?>&nbsp;&nbsp;
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $leadProjectType['LeadProjectType']['id']), array('class' => 'fa fa-pencil-square-o')); ?>&nbsp;&nbsp;
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $leadProjectType['LeadProjectType']['id']), array('class' => 'fa fa-star-half-o'), __('Are you sure you want to delete # %s?', $leadProjectType['LeadProjectType']['id'])); ?>
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

<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Lead Project Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Leads'), array('controller' => 'leads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leads'), array('controller' => 'leads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Types'), array('controller' => 'project_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Types'), array('controller' => 'project_types', 'action' => 'add')); ?> </li>
	</ul>
</div><?php */?>
</div>
</div>