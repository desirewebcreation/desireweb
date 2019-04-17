

<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file')); 
echo $this->Form->create('Client', array(
'class' => 'form-horizontal',
'role' => 'form',
'type' => 'file',
'id'=>'Client',
'inputDefaults' => array(
'format' => array('before', 'label', 'between', 'input','error', 'after'),
'div' => array('class' => 'form-group col-xs-12'),
'class' => array('form-control'),
'label' => array('class' => 'col-lg-3 control-label E-chnge'),
'between' => '<div class="col-xs-12">',
'after' => '</div>',
'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
)));

?> 



<div class="clients form">
<?php //echo $this->Form->create('Client'); ?>
	<fieldset>
					<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Edit Client'); ?></h3></div></div>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('company_name');
		echo $this->Form->input('countries_id');
		echo $this->Form->input('address_line1');
		echo $this->Form->input('address_line2');
		echo $this->Form->input('city');
		echo $this->Form->input('zip_code');
		echo $this->Form->input('email_address');
		echo $this->Form->input('phone');
		echo $this->Form->input('phone2');
		echo $this->Form->input('alternate_email');
		echo $this->Form->input('fax');
	
		echo $this->Form->input('modified_by',array('type'=>'hidden','value'=>$loginid));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Client.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Client.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Countries'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div><?php */?>
