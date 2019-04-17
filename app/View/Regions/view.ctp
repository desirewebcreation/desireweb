<div class="container">
<div class="col-lg-12">
<div class="sources view">
<div class="row meeting-tittle">
<div class="col-lg-3 col-sm-6"><h3><?php echo __('Region'); ?></h3> </div>
<?php /*?><div class="col-lg-8 col-sm-6">

	<ul>
		<li><?php echo $this->Html->link(__('Edit Region'), array('action' => 'edit', $req['Region']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Region'), array('action' => 'delete', $req['Region']['id']), array(), __('Are you sure you want to delete # %s?', $req['Region']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('action' => 'add')); ?> </li>
	</ul>
</div><?php */?>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($region['Region']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($region['Region']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	
</div><?php */?>
</div></div>