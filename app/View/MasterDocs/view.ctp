<div class="container">
<div class="col-lg-12">
<div class="sources view">
<div class="row meeting-tittle">
<div class="col-lg-3 col-sm-6"><h3><?php echo __('Master Doc'); ?></h3> </div>
<?php /*?><div class="col-lg-8 col-sm-6">

	<ul>
		<li><?php echo $this->Html->link(__('Edit Source'), array('action' => 'edit', $source['Source']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Source'), array('action' => 'delete', $source['Source']['id']), array(), __('Are you sure you want to delete # %s?', $source['Source']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sources'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source'), array('action' => 'add')); ?> </li>
	</ul>
</div><?php */?>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($masterDoc['MasterDoc']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($masterDoc['MasterDoc']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	
</div><?php */?>
</div></div>