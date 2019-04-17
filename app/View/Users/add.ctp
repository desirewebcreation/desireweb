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

<?php //echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Add User'); ?></h3></div> </div></legend>
	<?php
		echo $this->Form->input('name',array('placeholder'=>'Name'));
		echo $this->Form->input('email',array('placeholder'=>'Email'));
                //echo $this->Form->input('username',array('placeholder'=>'username'));
		echo $this->Form->input('password',array('placeholder'=>'Password'));               
                echo $this->Form->input('password_confirm', array('maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
               echo $this->Form->input('roles_id',array('type'=>'select','class'=>'form-control','label'=>false)); ?>
                     
	
	</fieldset>
    <?php 
          $options = array(
            'label' => 'Add User',
            'class' => 'btn form-submit',
        );
        ?>
<?php echo $this->Form->end($options); ?>
<!--
<div class="actions">
	<h3><?php //echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>-->
</div></div>