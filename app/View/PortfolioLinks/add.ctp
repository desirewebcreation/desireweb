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
<?php 
echo $this->Form->create('PortfolioLink', array(
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
<div class="portfolioLinks form">
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6">
<h3><?php echo __('Add Portfolio Link'); ?></h3></div>
		
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('tags');
		echo $this->Form->input('tools_used');
		echo $this->Form->input('for');
		echo $this->Form->input('live_status');
		echo $this->Form->input('work_type');
		echo $this->Form->input('url');
		echo $this->Form->input('currencies_id');
		echo $this->Form->input('price');
		echo $this->Form->input('countries_id');
		echo $this->Form->input('clients_id');
		echo $this->Form->input('nibiru_rating');
		echo $this->Form->input('is_responsive');
		echo $this->Form->input('live_on',array('type'=>'text','id'=>'datepicker1'));
		echo $this->Form->input('created_by',array('type'=>'hidden','class'=>'form-control','label'=>false,'value'=>$loginid));
		//echo $this->Form->input('modified_by');
	?>
	
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div></div>

