<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('Country', array(
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
<?php //echo $this->Form->create('Country'); ?>
	<fieldset>
			<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Add Country'); ?></h3></div></div>
	<?php
		echo $this->Form->input('name',array('placeholder'=>'Name'));
		echo $this->Form->input('country_code',array('placeholder'=>'Country code'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Add')); ?>
</div>


</div>