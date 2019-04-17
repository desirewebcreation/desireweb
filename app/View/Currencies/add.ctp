<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('Currency', array(
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
<?php //echo $this->Form->create('Currency'); ?>
	<fieldset>
				<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Add Currency'); ?></h3></div></div>
	<?php
		echo $this->Form->input('name',array('placeholder'=>'Name'));
		echo $this->Form->input('symbol',array('placeholder'=>'Symbol'));
		echo $this->Form->input('currency_code',array('placeholder'=>'Currency code'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Add')); ?>

<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Currencies'), array('action' => 'index')); ?></li>
	</ul>
</div><?php */?>
</div>
</div>
