
<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('CampaignType', array(
'class' => 'form-horizontal',
'role' => 'form',
'type' => 'file',
'id'=>'Client',
'inputDefaults' => array(
'format' => array('before', 'label', 'between', 'input','error', 'after'),
'div' => array('class' => 'form-group col-xs-12'),
//'class' => array('form-control'),
'label' => array('class' => 'col-lg-3 control-label E-chnge'),
'between' => '<div class="col-xs-12">',
'after' => '</div>',
'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
)));

?> 



<?php //echo $this->Form->create('CampaignType',array('class'=>'form-horizontal')); ?>
	<fieldset>
		<div class="row meeting-tittle">
<div class="col-lg-12 col-sm-6"><h3><?php echo __('Add Campaign Type'); ?></h3> </div> </div>
	
	        <div class="form-group">
           
            <div class="col-xs-12">
	<?php
		echo $this->Form->input('description',array('class'=>'form-control','label'=>'Campaign Type'));
	?>
    
     </div>
        </div>
	</fieldset>
<?php echo $this->Form->end(__('Add')); ?>
</div>
</div>


