<div class="container">
<div class="col-lg-9">
    <?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file')); 
echo $this->Form->create('SalesDoc', array(
'type' => 'file',
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
	
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6">
<h3><?php echo __('Edit Sales Doc'); ?></h3>
</div>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('for');
		echo $this->Form->input('url',array('label'=>'Sales Doc','type' => 'file'));
                echo $this->Form->input('SalesDoc.url.remove', array('type' => 'checkbox'));
		echo $this->Form->input('currencies_id');
		echo $this->Form->input('master_docs_id');
		//echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$loginid));
		echo $this->Form->input('modified_by',array('type'=>'hidden','value'=>$loginid));
	?>
	
<?php echo $this->Form->end(__('Update')); ?>
</div>
</div>
</div>

