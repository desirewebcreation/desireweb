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
<?php echo $this->Form->create('Lead',array('class'=>'form-horizontal')); ?>
	<fieldset>
		<legend><div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Add Lead'); ?></h3></div> </div></legend>
        
        
        <div class="form-group">
        <label class="control-label col-xs-12" for="inputEmail">Title</label>
            <div class="col-xs-12">
            <?php echo $this->Form->input('title',array('type'=>'text','class'=>'form-control','placeholder'=>'Title','label'=>false)); ?>
            </div>
        </div>
        
      
     <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Sources</label>
     <div class="col-xs-12">
     <?php echo $this->Form->input('sources_id',array('type'=>'select','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
     
     
      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Users</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('users_id',array('type'=>'select','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
     
     
     
      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Countries</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('countries_id',array('type'=>'select','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
     
     
     
      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Currency</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('currencies_id',array('type'=>'select','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
     
     
     
      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Client</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('clients_id',array('type'=>'select','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
            
      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Region</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('region_id',array('type'=>'select','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
            
            
       <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Lead group</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('lead_group_id',array('type'=>'select','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>      
     
     <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Reqs</label>
     <div class="col-xs-12">
       
    <?php echo $this->Form->input('Lead.Req',array('type'=>'select','class'=>'form-control','label'=>false,'multiple'=>true,'size'=>8)); ?>
     </div>
     </div>  
            
     
      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Campaigns</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('campaigns_id',array('type'=>'select','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
    
     
      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Requirement</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('requirement',array('type'=>'textarea','class'=>'form-control','rows'=>'3','placeholder'=>'Requirement','label'=>false)); ?>
     </div>
     </div>
     
     
     <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Scope</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('scope',array('type'=>'textarea','class'=>'form-control','rows'=>'3','placeholder'=>'Scope','label'=>false)); ?>
     </div>
     </div>
     
     
     <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Quotation</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('quotation',array('type'=>'textarea','class'=>'form-control','rows'=>'3','placeholder'=>'Quotation','label'=>false)); ?>
     </div>
     </div>
     
      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">First Communication</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('first_communication',array('type'=>'textarea','class'=>'form-control','rows'=>'3','placeholder'=>'First Communication','label'=>false,'required'=>'required')); ?>
     </div>
     </div>
     
     
     
      <div class="form-group">
   
         <label class="control-label col-xs-12" for="inputEmail">Expected Start Date</label>
     <div class="col-xs-12">
         <?php echo $this->Form->input('expected_start_date',array('id'=>'datepicker','type'=>'text','class'=>'form-control','label'=>false)); ?>
       
   </div>
   </div>
   
    <div class="form-group">
   
         <label class="control-label col-xs-12" for="inputEmail">Expected Price</label>
     <div class="col-xs-12">
     
          <?php echo $this->Form->input('expected_price', array('type'=>'text','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
        
    
     
     
      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Status</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('statuses_id',array('type'=>'select','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
     
         <div class="form-group ">
	 <label class="control-label col-xs-12" for="inputEmail">Project Type</label>
     <div class="col-xs-12">
       <div class="scroll">
       <?php      
	echo $this->Form->select('ProjectType',$ProjectTypes, array('multiple' => 'checkbox','label' => 'Text Label','class' => 'selbox'));
	
	  ?>
        </div>
       </div>
     </div>
     
      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Tag</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('tag',array('type'=>'text','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
     
     
     
         <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Reason For Lost</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('reason_for_leave',array('type'=>'text','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
     
     
<div class="form-group">
    <div class="col-xs-6">
         <?php echo $this->Form->input('created_by',array('type'=>'hidden','class'=>'form-control','label'=>false,'value'=>$loginid)); ?>
        </div>
       </div>   
        
      </div> 
  
      
       <div class="form-group">
	
     <div class="col-xs-12">
   <?php echo $this->Form->end(__('Submit')); ?>
     </div>
     </div>
     
     
    </div>
		
	<?php	
		//echo $this->Form->input('sources_id');
		//echo $this->Form->input('users_id');
		//echo $this->Form->input('countries_id');
		//echo $this->Form->input('currencies_id');
		//echo $this->Form->input('clients_id');
		//echo $this->Form->input('campaigns_id');
		//echo $this->Form->input('requirement');
		//echo $this->Form->input('scope');
		//echo $this->Form->input('quotation');
		//echo $this->Form->input('first_communication');
		//echo $this->Form->input('expected_start_date');
		//echo $this->Form->input('expected_price');
		//echo $this->Form->input('statuses_id');
		//echo $this->Form->input('tag');
		//echo $this->Form->input('created_by');
		//echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php //echo $this->Form->end(__('Submit')); ?>
</div>