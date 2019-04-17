<div class="container">
<div class="col-lg-12">
		<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6">
<h3><?php echo __('Sales Docs'); ?></h3> </div> <div class="col-lg-6"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>',array('action' => 'add'),array('escape' => false, 'class'=>'control-btn', 'title'=>'Add Sales Docs')); ?>
</div></div>
	<table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
	<thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
                        
			<th><?php echo $this->Paginator->sort('for'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			
			<th><?php echo $this->Paginator->sort('master_docs_id'); ?></th>			
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
                        
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
     
	<?php foreach ($salesDocs as $salesDoc): ?>
	<tr class="border">
		
		<td><?php echo h($salesDoc['SalesDoc']['title']); ?>&nbsp;</td>
		<td><?php echo h($salesDoc['SalesDoc']['description']); ?>&nbsp;</td>
                
		<td><?php echo h($salesDoc['SalesDoc']['for']); ?>&nbsp;</td>
		<td>
                  <?php if($salesDoc['SalesDoc']['url']!=""){ 
                     // echo $this->Html->link(__('download'),array('action'=>'download'));
                      ?>
                <a href="<?php echo FULL_BASE_URL.$this->webroot ?>uploads/sales_doc/url/<?php echo $salesDoc['SalesDoc']['url']; ?>" target="_blank"  style="color:#000 !important;"> <?php echo h($salesDoc['SalesDoc']['url']); ?></a>
                  <?php } else{
                    echo h($salesDoc['SalesDoc']['url']);  
                  }?>
              &nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($salesDoc['MasterDoc']['description'], array('controller' => 'master_docs', 'action' => 'view', $salesDoc['MasterDoc']['id'])); ?>
		</td>
		
		<td><?php echo h($salesDoc['Createdby']['name']); ?>&nbsp;</td>
		<td><?php echo h($salesDoc['Modifiedby']['name']); ?>&nbsp;</td>
		<td class="actions1">
			<?php echo $this->Html->link(__(''), array('action' => 'view', $salesDoc['SalesDoc']['id']),array('class' => 'fa fa-search fa-fw')).'&nbsp;&nbsp;'; ?> 
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $salesDoc['SalesDoc']['id']),array('class' => 'fa  fa-pencil-square-o')).'&nbsp;&nbsp;'; ?> 
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $salesDoc['SalesDoc']['id']), array('class' => 'fa fa-times'), __('Are you sure you want to delete # %s?', $salesDoc['SalesDoc']['id'])); ?>
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

