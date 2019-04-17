<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('Action', array(
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

<?php //echo $this->Form->create('Source'); ?>
	<fieldset>
		<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Add Lead Action'); ?></h3></div> </div>
	<?php
		echo $this->Form->text('title',array('class'=>'form-control required','rows'=>'3','placeholder'=>'Title','label'=>false));
		echo $this->Form->select('type',array(
				'Client'=>'Client','Follow Up'=>'Follow up','Nibiru'=>'Nibiru'),array('empty' => '(choose one)','class'=>'form-control','rows'=>'3','label'=>false));
		echo $this->Form->text('closing_action',array('type'=>'text','class'=>'form-control required','rows'=>'3','placeholder'=>'Closing Action','label'=>false));
		
		?>
	</fieldset>
<?php echo $this->Form->end(__('Add')); ?>



<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sources'), array('action' => 'index')); ?></li>
	</ul>
</div><?php */?>
</div>
</div>