<div class="container">
<div class="col-lg-12">
	<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6">
<h3><?php echo __('Clients'); ?></h3> </div> 
<div class="col-lg-6"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>',array('action' => 'add'),array('escape' => false, 'class'=>'control-btn', 'title'=>'Add Client')); ?>
</div>
</div>
<?php
	$ClientKeywordValue= isset ( $this->request->query ['ClientKeywordValue'] ) ? $this->request->query ['ClientKeywordValue'] : null;
?>
	<div class="row">
	<?php echo $this->Form->create('Client', array('class' => 'form-horizontal','action' => 'index', 'controller'=>'Client','type' => 'get') );?>
		<div class="col-sm-6">
			<label class="control-label" for="text">Keyword</label>
			<?php echo $this->Form->input('ClientKeywordValue',array('div'=>false,'class'=>'form-control','label'=>false,'placeholder'=>'Cleint name/Emaiil','type'=>'text','value'=>$ClientKeywordValue)); ?>
		</div>
	<div class="col-sm-2 filter_btn">	
	<?php $options = array('label' => 'Search', 'class' => 'submit btn btn-warning', 'div' => false); ?>
<?php echo $this->Form->end($options);?>
	</div>
	
	</div>
	<table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('company_name'); ?></th>
			<th><?php echo $this->Paginator->sort('email_address'); ?></th>
			<th><?php echo $this->Paginator->sort('countries_id'); ?></th>
			
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('zip_code'); ?></th>
			
		
			<!--<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($clients as $client): ?>
	<tr class="border">
		<td class="border_right" align="center"><?php echo h($client['Client']['company_name']); ?>&nbsp;</td>
		<td class="border_right" align="center"><?php echo h($client['Client']['email_address']); ?>&nbsp;</td>
		<td class="border_right" align="center">
			<?php echo $this->Html->link($client['Country']['name'], array('controller' => 'countries', 'action' => 'view', $client['Country']['id'])); ?>
		</td>
		
		<td class="border_right" align="center"><?php echo h($client['Client']['city']); ?>&nbsp;</td>
		<td class="border_right" align="center"><?php echo h($client['Client']['zip_code']); ?>&nbsp;</td>
		

		<!--<td class="border_right" align="center"><?php echo h($client['Createdby']['name']); ?>&nbsp;</td>
		<td class="border_right" align="center"><?php echo h($client['Modifiedby']['name']); ?>&nbsp;</td>-->
		<td class="actions1">
			<?php echo $this->Html->link(__(''), array('action' => 'view', $client['Client']['id']),array('class' => 'fa fa-search fa-fw')); ?>&nbsp;&nbsp;
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $client['Client']['id']),array('class' => 'fa  fa-pencil-square-o')); ?>&nbsp;&nbsp;
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $client['Client']['id']), array('class' => 'fa fa-times'), __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?>
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
<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Countries'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>*/?>
</div>
</div>