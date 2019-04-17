<div class="container">
	<div class="col-lg-12">
		<div class="row meeting-tittle">
			<div class="col-lg-6 col-sm-6">
				<h3><?php  echo __('Campaigns'); ?></h3>
			</div>
			<div class="col-lg-6 col-sm-6">
<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>',array('action' => 'add'),array('escape' => false, 'class'=>'control-btn', 'title'=>'Add Campaign')); ?>
 </div>
		</div>

		<table cellpadding="0" cellspacing="0"
			class="table table-striped table-responsive">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('title'); ?></th>
					<th><?php echo $this->Paginator->sort('campaign_types_id'); ?></th>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('status'); ?></th>
					<th><?php echo $this->Paginator->sort('start_date'); ?></th>
					<th><?php echo $this->Paginator->sort('end_date'); ?></th>

					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
	<?php foreach ($campaigns as $campaign): ?>
	<tr class="border">
					<td class="border_right" align="center"><?php echo h($campaign['Campaign']['title']); ?>&nbsp;</td>
					<td class="border_right" align="center">
			<?php echo $this->Html->link($campaign['CampaignType']['description'], array('controller' => 'campaign_types', 'action' => 'view', $campaign['CampaignType']['description'])); ?>
		</td>
					<td class="border_right" align="center"><?php echo h($campaign['CampaignType']['description']); ?>&nbsp;</td>
					<td class="border_right" align="center"><?php echo h($campaign['Status']['description']); ?>&nbsp;</td>
					<td class="border_right" align="center"><?php echo h($campaign['Campaign']['start_date']); ?>&nbsp;</td>
					<td class="border_right" align="center"><?php echo h($campaign['Campaign']['end_date']); ?>&nbsp;</td>

					<td class="actions1">
			
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $campaign['Campaign']['id']), array('class' => 'fa fa-pencil-square-o')); ?>&nbsp;&nbsp;
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $campaign['Campaign']['id']), array('class' => 'fa fa-times'), __('Are you sure you want to delete # %s?', $campaign['Campaign']['id'])); ?>
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
</div>