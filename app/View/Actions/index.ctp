<div class="container">
<div class="col-lg-12 meeting-title row">
<div class="col-lg-6 col-sm-6">
<h3> <?php echo __('Actions'); ?></h3> </div><div class="col-lg-6"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>',array('action' => 'add'),array('escape' => false, 'class'=>'control-btn', 'title'=>'Add Action')); ?>
</div></div>

	<table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
	<thead>
	<tr>	
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('closing action'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($actions as $action): ?>
	<tr class="border">
		<td class="border_right" align="center"><?php echo h($action['Action']['title']); ?>&nbsp;</td>
		<td class="border_right" align="center"><?php echo h($action['Action']['type']); ?>&nbsp;</td>
		<td class="border_right" align="center"><?php echo h($action['Action']['closing_action']); ?>&nbsp;</td>
		
		<td class="actions1">
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $action['Action']['id']), array('class' => 'fa fa-pencil-square-o')); ?>&nbsp;&nbsp;
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $action['Action']['id']), array('class' => 'fa fa-times'), __('Are you sure you want to delete # %s?', $action['Action']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Source'), array('action' => 'add')); ?></li>
	</ul>
</div>
<?php */?></div>
</div>