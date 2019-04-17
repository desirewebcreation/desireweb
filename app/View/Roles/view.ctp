<div class="container">
<div class="col-lg-12">
<div class="statuses view">
<div class="row meeting-tittle">
<div class="col-lg-3 col-sm-6"><h3><?php echo __('Status'); ?></h3> </div> </div>
<?php /*?><div class="col-lg-8 col-sm-6">

	<ul>
		<li><?php echo $this->Html->link(__('Edit Status'), array('action' => 'edit', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Status'), array('action' => 'delete', $status['Status']['id']), array(), __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('action' => 'add')); ?> </li>
	</ul>
</div><?php */?>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($status['Status']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($status['Status']['description']); ?>
			&nbsp;
		</dd>
	</dl>


</div></div>