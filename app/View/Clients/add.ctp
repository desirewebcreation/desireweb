
<script>
$(document).ready(function(){

$("#datepicker" ).datepicker({
						   dateFormat: 'yy-mm-dd',
						   changeMonth: true,
						   changeYear: true,
						   
					}); 
					
					$("#datepicker1" ).datepicker({
						   dateFormat: 'yy-mm-dd',
						   changeMonth: true,
						   changeYear: true,
						   
					}); 
});
</script>









<div class="container">
<div class="col-lg-9">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file')); 
echo $this->Form->create('Client', array(
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
<?php //echo $this->Form->create('Client'); ?>
	<fieldset>
		<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6">
<h3><?php echo __('Add Client'); ?></h3></div>
	<?php
		echo $this->Form->input('company_name',array('placeholder'=>'Company Name'));
		echo $this->Form->input('countries_id');
		echo $this->Form->input('address_line1',array('placeholder'=>'Address line1'));
		echo $this->Form->input('address_line2',array('placeholder'=>'Address line2'));
		echo $this->Form->input('city',array('placeholder'=>'City'));
		echo $this->Form->input('zip_code',array('placeholder'=>'Description'));
		echo $this->Form->input('email_address',array('placeholder'=>'Email Address'));
		echo $this->Form->input('phone',array('placeholder'=>'Phone'));
		echo $this->Form->input('phone2',array('placeholder'=>'Phone 2'));
		echo $this->Form->input('alternate_email',array('placeholder'=>'Alternate Email'));
		echo $this->Form->input('fax',array('placeholder'=>'Fax'));
		echo $this->Form->input('created_by',array('type'=>'hidden','class'=>'form-control','label'=>false,'value'=>$loginid)); 
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div></div>
