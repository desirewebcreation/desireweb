<div class="container">
<div class="col-lg-12">
<div class="countries view">
<div class="row meeting-tittle">
<div class="col-lg-3 col-sm-6"><h3><?php echo __('Country'); ?></h3> </div>


<div class="col-lg-8 col-sm-6">

	<ul>
		<li><?php echo $this->Html->link(__('Edit Country'), array('action' => 'edit', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country'), array('action' => 'delete', $country['Country']['id']), array(), __('Are you sure you want to delete # %s?', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('action' => 'add')); ?> </li>
	</ul>
</div>
</div>


	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($country['Country']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($country['Country']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country Code'); ?></dt>
		<dd>
			<?php echo h($country['Country']['country_code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>


</div>
</div>