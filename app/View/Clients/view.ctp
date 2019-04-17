<div class="container">
<div class="col-lg-12">
<div class="campaigns view">
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Client'); ?></h3> </div> </div>
	<dl>
		<dt><?php  echo __('Id'); ?></dt>
		<dd>
			<?php echo h($client['Client']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Countries'); ?></dt>
		<dd>
			<?php echo $this->Html->link($client['Country']['name'], array('controller' => 'countries', 'action' => 'view', $client['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line1'); ?></dt>
		<dd>
			<?php echo h($client['Client']['address_line1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line2'); ?></dt>
		<dd>
			<?php echo h($client['Client']['address_line2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($client['Client']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip Code'); ?></dt>
		<dd>
			<?php echo h($client['Client']['zip_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Address'); ?></dt>
		<dd>
			<?php echo h($client['Client']['email_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($client['Client']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone2'); ?></dt>
		<dd>
			<?php echo h($client['Client']['phone2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alternate Email'); ?></dt>
		<dd>
			<?php echo h($client['Client']['alternate_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fax'); ?></dt>
		<dd>
			<?php echo h($client['Client']['fax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($client['Createdby']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($client['Createdby']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
</div>
<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client'), array('action' => 'edit', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client'), array('action' => 'delete', $client['Client']['id']), array(), __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Countries'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>*/
