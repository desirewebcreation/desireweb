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
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Edit Lead Project Type'); ?></h3> </div> </div>
<?php //echo $this->Form->create('LeadProjectType'); ?>
	<fieldset>
		<legend><?php //echo __('Edit Lead Project Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('leads_id');
		echo $this->Form->input('project_types_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LeadProjectType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('LeadProjectType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lead Project Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Leads'), array('controller' => 'leads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leads'), array('controller' => 'leads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Types'), array('controller' => 'project_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Types'), array('controller' => 'project_types', 'action' => 'add')); ?> </li>
	</ul>
</div><?php */?>
