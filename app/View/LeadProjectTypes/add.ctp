<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('LeadProjectType', array(
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
<div class="leadProjectTypes form">
<?php //echo $this->Form->create('LeadProjectType'); ?>
	<fieldset>
		<legend><div class="row meeting-tittle">
<div class="col-lg-12 col-sm-6"><h3><?php echo __('Add Lead Project Type'); ?></h3></div> </div></legend>
	<?php
		echo $this->Form->input('leads_id');
		echo $this->Form->input('project_types_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Lead Project Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Leads'), array('controller' => 'leads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leads'), array('controller' => 'leads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Types'), array('controller' => 'project_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Types'), array('controller' => 'project_types', 'action' => 'add')); ?> </li>
	</ul>
</div><?php */?>
</div></div>