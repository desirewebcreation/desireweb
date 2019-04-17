<div class="container">
<div class="col-lg-12">
<div class="campaigns view">
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3>
<?php echo __('Currency'); ?></h3></div></div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($currency['Currency']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($currency['Currency']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Symbol'); ?></dt>
		<dd>
			<?php echo h($currency['Currency']['symbol']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Currency Code'); ?></dt>
		<dd>
			<?php echo h($currency['Currency']['currency_code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Currency'), array('action' => 'edit', $currency['Currency']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Currency'), array('action' => 'delete', $currency['Currency']['id']), array(), __('Are you sure you want to delete # %s?', $currency['Currency']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Currencies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Currency'), array('action' => 'add')); ?> </li>
	</ul>
</div<?php */?>
