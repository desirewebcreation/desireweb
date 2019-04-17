<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('LeadGroup', array(
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

<?php //echo $this->Form->create('ProjectType'); ?>
	<fieldset>
		<legend><div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Add Lead Group'); ?></h3></div> </div></legend>
	<?php
		echo $this->Form->input('description',array('type'=>'text','class'=>'form-control','placeholder'=>'Description','label'=>false));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Add')); ?>

<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Project Types'), array('action' => 'index')); ?></li>
	</ul>
</div><?php */?>
</div></div>