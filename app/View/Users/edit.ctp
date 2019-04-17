<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('User', array(
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

<div class="users">

<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Edit User'); ?></h3> </div> </div>
<?php //echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php //echo __('Edit User'); ?></legend>
	<?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        //echo $this->Form->input('username', array( 'readonly' => 'readonly', 'label' => 'Usernames cannot be changed!'));
        echo $this->Form->input('email');
        echo $this->Form->input('password_update', array( 'label' => array('text'=>'New Password (leave empty if you do not want to change)','class'=>'col-lg-12 control-label E-chnge'), 'maxLength' => 255, 'type'=>'password','required' => 0));
        echo $this->Form->input('password_confirm_update', array('label' => array('text'=>'Confirm New Password','class'=>'col-lg-12 control-label E-chnge'), 'maxLength' => 255, 'title' => 'Confirm New password', 'type'=>'password','required' => 0));
         
 
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'user' => 'User', 'client' => 'Client')
        ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Update')); ?>
</div>


<?php /*?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div><?php */?>
</div></div>
