<div class="container">
<div class="col-lg-12">
<div class="sources view">
<div class="row meeting-tittle">
<div class="col-lg-3 col-sm-6"><h3><?php echo __('Req'); ?></h3> </div>
<?php /*?><div class="col-lg-8 col-sm-6">

	<ul>
		<li><?php echo $this->Html->link(__('Edit Req'), array('action' => 'edit', $req['Req']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Req'), array('action' => 'delete', $req['Req']['id']), array(), __('Are you sure you want to delete # %s?', $req['Req']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reqs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Req'), array('action' => 'add')); ?> </li>
	</ul>
</div><?php */?>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($req['Req']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($req['Req']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	
</div><?php */?>
</div></div>