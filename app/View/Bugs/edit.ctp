<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('Bug', array(
'class' => 'form-horizontal',
'role' => 'form',
'type' => 'file',
'id'=>'Bug',
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
<div class="sources form">
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Edit Bug'); ?></h3> </div> </div>
<?php //echo $this->Form->create('Source'); ?>
	<fieldset>
		<legend><?php //echo __('Edit Source'); ?></legend>
	<?php
		echo $this->Form->input('id');
		
			echo $this->Form->input('title',array('type'=>'text','class'=>'form-control','placeholder'=>'Title','label'=>false));
			echo $this->Form->input('description',array('type'=>'textarea','class'=>'form-control','placeholder'=>'Description','label'=>false));
			echo $this->Form->select('type',array(
					'Bug'=>'Bug','Feature Request'=>'Feature Request'),array('empty' => '(choose one)','class'=>'form-control','rows'=>'2','label'=>false));
			echo $this->Form->select('status',array(
					'Open'=>'Open','Fixed'=>'Fixed','Invalid'=>'Invalid'),array('empty' => '(choose one)','class'=>'form-control','rows'=>'2','label'=>false));
			echo $this->Form->select('priority',array(
					'P1'=>'P1','P2'=>'P2','P3'=>'P3','P4'=>'P4'),array('empty' => '(choose one)','class'=>'form-control','rows'=>'2','label'=>false));
				
			echo $this->Form->input('developer_comment',array('type'=>'textarea','class'=>'form-control','placeholder'=>'Description','label'=>false));
				
			?>
	</fieldset>
<?php echo $this->Form->end(__('Update')); ?>
</div>
<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Source.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Source.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sources'), array('action' => 'index')); ?></li>
	</ul>
</div><?php */?>
</div></div>
