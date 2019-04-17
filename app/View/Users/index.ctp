<div class="container">

<div class="row meeting-tittle">
		
<div class="col-lg-6 col-sm-6">
<h3> <?php echo __('Users');  ?></h3> </div><div class="col-lg-6"><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>',array('action' => 'add'),array('escape' => false, 'class'=>'control-btn', 'title'=>'Add User')); ?>
</div></div>
	<div class="col-lg-12">
	<table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
	<thead>
	<tr>
			<th>Name</th>
			<th>Email</th>
			
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr class="border">
		<td class="border_right" align="center"><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td class="border_right" align="center"><?php echo h($user['User']['email']); ?>&nbsp;</td>
		
		<td class="actions1">
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $user['User']['id']), array('class' => 'fa fa-pencil-square-o')); ?>&nbsp;&nbsp;
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $user['User']['id']), array('class' => 'fa fa-times'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
	</ul>
</div><?php */?>
</div>
</div>