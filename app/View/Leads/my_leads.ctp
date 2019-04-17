<script>
$(document).ready(function(){
    $("#datepickerAction" ).datepicker({
		   dateFormat: 'yy-mm-dd',
		   changeMonth: true,
		   changeYear: true,		   
	}); 
    
	 $("#show_filter").click(function(){
        $("div.filter").slideToggle(1000);
    });
	 <?php  $j=0; foreach ($leads as $lead){?> $("#show_quickEdit<?php echo $j;?>").click(function(){
	        $("div.quickEdit<?php echo $j;?>").slideToggle(1000);
	    });
	 
<?php $j++; }?>
});
</script>
<div class="container">

	<div class="col-lg-12 filter"
		<?php if(!( isset( $this->request->query ['ProjectKeywordValue'] ) || isset ( $this->request->query ['ClientNameValue'] ) || isset ( $this->request->query ['UsernameValue'] ) ||  isset ( $this->request->query ['CountryValue'] ) || isset ( $this->request->query ['CampaignValue'] ) || isset($this->request->query['StatusValue']) || isset ( $this->request->query ['StatusValue'] )) ){ ?>
		style="display: none;" <?php } ?>>
		<div class="row meeting-tittle">
			<div class="col-lg-3 col-sm-6">
				<h2><?php  echo __('Filter Leads'); ?></h2>
			</div>
		</div>
		<div class="row">

			<div class="col-lg-12">
         <?php echo $this->Form->create('Lead', array('class' => 'form-horizontal','action' => 'myLeads', 'controller'=>'Lead','type' => 'get') );?>
         </div>
            <?php           
                 $ProjectKeywordValue = isset ( $this->request->query ['ProjectKeywordValue'] ) ? $this->request->query ['ProjectKeywordValue'] : null;
		//$ClientNameValue = isset ( $this->request->query ['ClientNameValue'] ) ? $this->request->query ['ClientNameValue'] : null;
		$ClientValue =  isset ( $this->request->query ['ClientValue'] ) ? $this->request->query ['ClientValue'] : null;
                $UsernameValue = isset ( $this->request->query ['UsernameValue'] ) ? $this->request->query ['UsernameValue'] :null;
		$CreatorValue = isset ( $this->request->query ['CreatorValue'] ) ? $this->request->query ['CreatorValue'] :null;
		$CountryValue = isset ( $this->request->query ['CountryValue'] ) ? $this->request->query ['CountryValue'] : null;
		$CampaignValue = isset ( $this->request->query ['CampaignValue'] ) ? $this->request->query ['CampaignValue'] : null;
		// $Status = isset($this->request->query['Status']) ? $this->request->query['Status']:'';
		
		$StatusValue = isset ( $this->request->query ['StatusValue'] ) ? $this->request->query ['StatusValue'] : null;
                $RegionValue = isset ( $this->request->query ['RegionValue'] ) ? $this->request->query ['RegionValue'] : null;
                $LeadGroupsValue = isset ( $this->request->query ['LeadGroupsValue'] ) ? $this->request->query ['LeadGroupsValue'] : null;
                $CreatedOn = isset ( $this->request->query ['CreatedOn'] ) ? $this->request->query ['CreatedOn'] : null;
		?>
			<div class="form-group">

		<div class="col-xs-12 row">
					<div class="col-xs-7">
						<div class=" row">
							<div class="col-xs-4">
								<label class="control-label" for="text">Keyword</label><?php echo $this->Form->input('ProjectKeywordValue',array('div'=>false,'class'=>'form-control','label'=>false,'placeholder'=>'title/tag/equirement/scope/id','type'=>'text','value'=> $ProjectKeywordValue)); ?>
					</div>
							<div class="col-xs-4">
								<label class="control-label" for="text">Client Name/Email</label><?php //echo $this->Form->select('ClientNameValue', $clientname,array('class'=>'form-control','empty'=>'Select Client', 'value'=>$ClientNameValue)); ?><?php echo $this->Form->input('ClientValue',array('div'=>false,'class'=>'form-control','label'=>false,'placeholder'=>'','type'=>'text','value'=> $ClientValue)); ?>
						</div>
							<div class="col-xs-4">
								<label class="control-label" for="text">Owner</label><?php echo $this->Form->select('UsernameValue', $username,array('class'=>'form-control','empty'=>'Select Owner', 'value'=>$UsernameValue)); ?>
						</div>
						</div>
						<div class=" row">
							<div class="col-xs-4">
								<label class="control-label" for="text">Country</label><?php echo $this->Form->select('CountryValue', $country,array('class'=>'form-control','empty'=>'Select Country', 'value'=>$CountryValue)); ?>
                                                                <label class="control-label" for="text">Region</label><?php echo $this->Form->select('RegionValue', $region,array('class'=>'form-control','empty'=>'Select Region', 'value'=>$RegionValue)); ?>
					</div>
							<div class="col-xs-4">
								<label class="control-label" for="text">Campaign</label>
					<?php echo $this->Form->select('CampaignValue', $Campaign,array('class'=>'form-control','empty'=>'Select Campaign', 'value'=>$CampaignValue)); ?>
                                         <label class="control-label" for="text">Lead Groups</label><?php echo $this->Form->select('LeadGruopsValue', $leadgroup,array('class'=>'form-control ad','size'=>'5','empty'=>false,'name'=>"LeadGroupsValue",'multiple' => 'multiple','value' =>$LeadGroupsValue )); ?>                       

						</div>
							<div class="col-xs-4">		
							<label class="control-label" for="text">Created By</label><?php echo $this->Form->select('CreatorValue', $username,array('class'=>'form-control','empty'=>'Created by', 'value'=>$CreatorValue)); ?>
					
                                                        <label class="control-label" for="text">Created On</label><?php   echo $this->Form->input('CreatedOn',array('id'=>'datepickerAction','type'=>'text','class'=>'form-control','label'=>false,'value'=>$CreatedOn));  ?>
                                                        
                                                        </div>
						</div>
					</div>
					<div class="col-xs-5">
						<label class="control-label" for="text">Lead Status</label><?php echo $this->Form->select('StatusValue', $Status,array('class'=>'form-control ad','size'=>'13','empty'=>false,'name'=>"StatusValue",'multiple' => 'multiple','value' =>$StatusValue )); ?>
						</div>

				</div>
				<div class="col-xs-12 row filter_btn">	
				 <?php $options = array('label' => 'Search', 'class' => 'submit btn btn-warning', 'div' => false); ?>
<?php echo $this->Form->end($options);?>
				</div>
			</div>



		</div>
	</div>

	<div classs="row">
		<div class="col-lg-6 pull-left">
			<a id="show_filter" href="#">Toggle Filter</a>
		</div>
		<div class="col-lg-6 pull-right">
			<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>',array('action' => 'add'),array('escape' => false, 'class'=>'control-btn', 'title'=>'Add Lead')); ?>
			
			
			
		</div>
	</div>


	<div class="row control_panel">

		<div class="sort_icons col-lg-6 pull-left">Sort by: <?php echo $this->Paginator->sort('users_id','Owner', array('class'=>'ctrl_btn')); ?>
<?php echo $this->Paginator->sort('countries_id','Country', array('class'=>'ctrl_btn')); ?>		
<?php echo $this->Paginator->sort('statuses_id','Status', array('class'=>'ctrl_btn')); ?>	
<?php echo $this->Paginator->sort('created','Date', array('class'=>'ctrl_btn')); ?>		
			</div>
		<div class="sort_icons col-lg-6 pull-right"></div>

		<div class="leads_listing col-lg-12"> 
<?php  $i=0; foreach ($leads as $lead){  ?>
<div class="lead <?php if($i%2==0) echo "even_row" ?>">
				<div class="row">
					<div class="col-lg-5">
						<div class="lead_title">#<?php echo h($lead['Lead']['id']); ?>-<?php echo h($lead['Lead']['title']); ?>-<?php echo h($lead['Client']['company_name']);echo '-'.$lead['Currency']['symbol'].$lead['Lead']['expected_price']; ?></div>
						<div class="lead_meta">
							Added on:<b><?php echo h($lead['Lead']['created']); ?></b>, Added
							By:<b><?php echo h($lead['Createdby']['first_name']); ?></b>, Source:<b><?php echo h($lead['Source']['description']); ?></b>,
							Country:<b><?php echo h($lead['Country']['name']); ?></b><br/>
                                                        Tags:<b><?php echo $lead['Lead']['tag']; ?></b>
						</div>
					</div>
					<div class="col-lg-1 lead_status">
						<span
							class="status_btn <?php if(($lead['Lead']['statuses_id']==1)||($lead['Lead']['statuses_id']==2)) echo "red" ; elseif(($lead['Lead']['statuses_id']==3)||($lead['Lead']['statuses_id']==7))echo "green"; elseif(($lead['Lead']['statuses_id']==4)||($lead['Lead']['statuses_id']==5)||($lead['Lead']['statuses_id']==6)||($lead['Lead']['statuses_id']==8))echo "red_border"; ?>"><?php echo $lead['Status']['description']; ?></span>
					</div>
					<div class="col-lg-1 lead_owner">
						<span class="lead_owner"><?php echo $lead['User']['first_name'] ?></span>
					</div>
					<div class="col-lg-2 lead_owner">
						<span
							class="lead_owner ">
                                                            <?php
                                                      $reqarray = []; 
                                                    foreach ($lead['Req'] as $req) {
                                                        $reqarray[] = $req['description'];
                                                    }
                                                    echo implode(', ', $reqarray);
                                ?></span>
					</div>
					<div class="col-lg-1 lead_next_steps">
						<span class="lead_owner"><?php echo $lead['Lead']['last_next_action']; ?></span>
					</div>
					<div class="col-lg-2 lead_actions">
						<span class="lead_actions"><?php echo $this->Html->link('<i class="fa fa-pencil"></i>', '#',array('escape' => false,'id'=>'show_quickEdit'.$i)); ?>&nbsp;&nbsp;<?php echo $this->Html->link('<i class="fa fa-search fa-fw"></i>', array('action' => 'view', $lead['Lead']['id']),array('escape' => false)); ?>&nbsp;&nbsp;
			<?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>', array('action' => 'edit', $lead['Lead']['id']), array('escape' => false)); ?>&nbsp;&nbsp;
			<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $lead['Lead']['id']),array('escape'=>false), __('Are you sure you want to delete # %s?', $lead['Lead']['id'])); ?></span>
					</div>
				</div>
<div class="quickEdit<?php echo $i;?> quickEdit" style="display: none;">
					<div class="row col-lg-12">
						<h4>
							<b>Quick Edit</b>
						</h4>
					</div>

					<div class="row col-lg-12">			 
		   <?php	echo $this->Form->create('Lead',array('class' => 'form-inline','url'=>array('controller'=>'Leads', 'action'=>'quickEditLead',$lead['Lead']['id'] ))); ?>
	
					<input type="hidden" name="data[Lead][id]" class="form-control" value="<?php echo $lead['Lead']['id'];?>">
					
					<div class="form-group">
						<div class="col-lg-12">
							<label class="control-label" for="text">Lead Status </label>
				
				
				<?php echo $this->Form->select('statuses_id', $Status,array('class'=>'form-control ad','placeholder'=>'Status','value'=>$lead['Lead']['statuses_id'] )); ?>
									      	
			<?php
	
	echo $this->Form->input ( 'modified_by', array (
			'type' => 'hidden',
			'value' => $loginid 
	) );
	
	?>
	</div>
	</div>
	<div class="form-group">
		<div class="col-lg-12">
		<label class="control-label " for="text">Last Action</label>
		<?php  echo $this->Form->input('last_next_action',array('class'=>'form-control ad','placeholder'=>'Last Action','value'=>$lead['Lead']['last_next_action'] ,'label'=>false)); ?>
	</div>
	</div>
	<div class="form-group">
	<div class="col-lg-12">
							<label class="control-label " for="text">Tags</label>
		<?php  echo $this->Form->input('tag',array('class'=>'form-control ad','placeholder'=>'Tags','value'=>$lead['Lead']['tag'] ,'label'=>false)); ?>
	</div>
	</div>
	<div class="form-group">
	<div class="col-lg-12">
							<label class="control-label " for="text">Lead Status </label>
				<?php echo $this->Form->select('users_id', $username,array('class'=>'form-control ad','placeholder'=>'Status','value'=>$lead['Lead']['users_id'] )); ?>
									      	
			
	</div>
	</div>
	<div class="form-group">
						<div class="col-lg-12">   
<?php echo $this->Form->end(__('Update Lead')); ?>
</div>
</div>
				
				</div>
			</div>
		

</div>
<?php $i++ ;} ?>

		<div class="col-lg-12">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</div>
		<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>


	</div>
</div>