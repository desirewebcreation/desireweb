<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('CampaignType', array(
'class' => 'form-horizontal',
'role' => 'form',
'type' => 'file',
'id'=>'CampaignType',
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


<div class="campaignTypes form">
<?php //echo $this->Form->create('CampaignType'); ?>
	<fieldset>
		<div class="row meeting-tittle">
<div class="col-lg-8 col-sm-6"><h3><?php echo __('Edit Campaign Type'); ?></h3></div></div>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
</div>
<?php /*<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CampaignType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('CampaignType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Campaign Types'), array('action' => 'index')); ?></li>
	</ul>
</div>*/?>
