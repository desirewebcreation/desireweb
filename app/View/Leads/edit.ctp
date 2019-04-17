<script>
$(document).ready(function(){
	 $("#add_action").click(function(){
        $("div.add_action_form").slideToggle(1000);
    });

	 $("#datepickerAction" ).datepicker({
		   dateFormat: 'yy-mm-dd',
		   changeMonth: true,
		   changeYear: true,
		   
	}); 
});

</script>
<div class="container">


<div class="leads">
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Edit Lead'); ?></h3> </div> <div class="col-lg-6 col-sm-6"> <?php echo $this->Html->link('<i class="fa fa-search fa-fw"></i>',array('action' => 'view',$this->request->data ['Lead'] ['id']),array('escape' => false, 'class'=>'control-btn', 'title'=>'View Lead Details')); ?>
 </div></div>
<ul class="nav nav-pills">

			<li class="active"><a data-toggle="pill" href="#lead_details">Details</a></li>
			<li><a data-toggle="pill" href="#actions">Actions</a></li>
		</ul>
		<div class="tab-content col-lg-12">
			<div id="lead_details" class="tab-pane fade in active">

	<div class="col-lg-12">
<?php //echo $this->Form->create('EmployeeProfile',array('type' => 'file'));
echo $this->Form->create('Lead', array(
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
		<legend><?php  //echo __('Edit Lead'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title',array('type'=>'text'));
		echo $this->Form->input('sources_id');
		echo $this->Form->input('users_id');
		echo $this->Form->input('countries_id');
		echo $this->Form->input('currencies_id');
		echo $this->Form->input('clients_id');
                echo $this->Form->input('region_id');
                echo $this->Form->input('lead_group_id');
                echo $this->Form->input('Lead.Req',array('type'=>'select','multiple'=>true,'size'=>8));
		echo $this->Form->input('campaigns_id');
		echo $this->Form->input('requirement');
		echo $this->Form->input('scope');
		echo $this->Form->input('quotation');
		echo $this->Form->input('first_communication',array('required'=>'required'));
		echo $this->Form->input('expected_start_date',array('type'=>'text'));
		echo $this->Form->input('expected_price',array('type'=>'text')); ?>
		   <?php echo $this->Form->input('statuses_id',array('type'=>'select','class'=>'form-control')); ?>
		      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Project Type</label>
     <div class="col-xs-12">
     <div class="scroll">
	<?php	echo $this->Form->select('ProjectType',$allProjectType, array('multiple' => 'checkbox','label' => 'ProjectType','class' => 'selbox','value'=>$selectedProjectType));
		?>
        </div>
		</div>
		</div>
	<?php	echo $this->Form->input('tag');
	
	echo $this->Form->input('modified_by',array('type'=>'hidden','value'=>$loginid));
			
	?>
	
	      <div class="form-group">
	 <label class="control-label col-xs-12" for="inputEmail">Reason For Lost</label>
     <div class="col-xs-12">
    <?php echo $this->Form->input('reason_for_leave',array('type'=>'text','class'=>'form-control','label'=>false)); ?>
     </div>
     </div>
     
	
<?php echo $this->Form->end(__('Update')); ?>
</div>
</div>
			
			<div id="actions" class="tab-pane fade">
			<div class="row">	<div class="col-lg-5"></div><div class="col-lg-2" style="text-align:center;"><button id="add_action" value="Add Action">+ Add New Action</button></div><div class="col-lg-5"></div></div>
				<div class="add_action_form" style="display: none;">
					<h2>Add Action</h2>
				<?php	echo $this->Form->create('LeadAction',array('url'=>array('controller'=>'Leads', 'action'=>'saveAction',$this->request->data['Lead']['id']))); ?>
			<?php 	 $url = $this->Html->url(array('controller' => 'Leads', 'action' => 'action_type_actions_ajax', 'ext' => 'json')); ?>
 
				
				<?php 
/*
			       *
			       * echo $this->Form->select ( 'type', array (
			       * 'Client' => 'Client',
			       * 'Follow Up' => 'Follow Up',
			       * 'Nibiru' => 'Nibiru'
			       * ), array (
			       * 'class' => 'form-control',
			       * 'rows' => '3',
			       * 'label' => false,
			       * 'id' => 'actionType',
			       * 'rel' => $url,
			       * 'empty'=>false
			       * ) );
			       */
				?>
				
				 <?php
					
echo $this->Form->select ( 'lead_action_id', $actionTitles, array (
							'class' => 'form-control',
							'id' => 'actionTitles',
							'empty' => 'Choose Action',
							'label' => false 
					) );
					?>
				 		<?php
							
echo $this->Form->select ( 'status', array (
									'Open' => 'Open',
									'Scheduled' => 'Scheduled' 
							), array (
									'class' => 'form-control',
									'rows' => '2',
									'label' => false,
									'id' => 'status',
									'empty' => false 
							) );
							?>
				
				 		
				 		 <?php
								
echo $this->Form->select ( 'owner_id', $users, array (
										'class' => 'form-control',
										'id' => 'actionOwner',
										'empty' => 'Choose Owner' 
								) );
								?>
				 						 		
				 		<?php echo $this->Form->input('action_done_on',array('id'=>'datepickerAction','type'=>'text','class'=>'form-control','label'=>false,'placeholder'=>'Date of Action', 'readonly')); ?>
       							<?php echo $this->Form->input('action_note',array('type'=>'textarea','class'=>'form-control','rows'=>'3','placeholder'=>'Action Note','label'=>false)); ?>
   
   
				 <?php // print_r($actionTitles); ?>
  			
				<?php echo $this->Form->end(__('Submit')); ?>
  
				
</div>
			<?php $count=0; foreach ($actions as $leadAction){?>
			<div class="individual_action <?php if($count%2==0) echo "even"; else echo "odd";  ?>">
			
								<?php  if($leadAction['Action']['type']=='Client'){?>
								<?php  if($leadAction['LeadAction']['status']=='Completed'){?>
										<div class="client_closing_action nibiru action row">
											<div class="client_name col-lg-2 left"><?php echo $this->request->data['User']['name']; ?> </div>
											<div class="col-lg-10"><div  class="bubble_left left">
												<div class="action_title left"><?php echo $leadAction['Action']['closing_action']; ?></div>
												<div class="action_date left"><?php echo $leadAction['LeadAction']['action_completed_on'] ; ?></div>
												<div class="action_note left"><?php echo $leadAction['LeadAction']['action_completion_note'] ; ?></div>
											</div>
										 </div>
										 </div>
										<?php } ?>
								<div class="client_action client action row">
											<div class="client_name  col-lg-2 right"><?php echo $this->request->data['Client']['company_name']; ?> </div>
											<div class="col-lg-10">
												<div class=" bubble_right right">
													<div class="action_title right"><?php echo $leadAction['Action']['title'] ; ?></div>
													<div class="action_date right"><?php echo $leadAction['LeadAction']['action_done_on'] ; ?></div>
													<div class="action_note right"><?php echo $leadAction['LeadAction']['action_note'] ; ?></div>
												</div>
												<?php  if($leadAction['LeadAction']['status'] =='Scheduled'){?>
											<div class="complete_btn right">
													<a href='#openAction<?php  echo $leadAction['LeadAction']['id']; ?>' class="complete_btn" data-toggle="modal">Open</a>
												</div>
												<!-- Modal -->
												<div id="openAction<?php  echo $leadAction['LeadAction']['id']; ?>" class="modal fade" role="dialog">
													<div class="modal-dialog">
					
														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Open Action: <?php echo $leadAction['Action']['title'] ; ?></h4>
															</div>
															<div class="modal-body">
					        <?php	echo $this->Form->create('LeadAction',array('url'=>array('controller'=>'Leads', 'action'=>'openAction',$lead['Lead']['id'],$leadAction['LeadAction']['id'] ))); ?>
						  	<?php echo $this->Form->input('action_note',array('type'=>'textarea','class'=>'form-control','rows'=>'3','placeholder'=>'Action Note','label'=>false)); ?>
					    <input type="hidden" value="<?php echo $leadAction['Action']['id'] ; ?>" name="data[LeadAction][lead_action_id]" />
					  
					   
									 <?php // print_r($actionTitles); ?>
					  			
									<?php echo $this->Form->end(__('Complete')); ?>
					      </div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default"
																	data-dismiss="modal">Close</button>
															</div>
														</div>
					
													</div>
												</div>
												<?php } ?>
													<?php  if($leadAction['LeadAction']['status'] =='Open'){?>
											<div class="complete_btn right">
													<a href='#completeAction<?php  echo $leadAction['LeadAction']['id']; ?>' class="complete_btn" data-toggle="modal">Complete</a>
												</div>
												<!-- Modal -->
												<div
													id="completeAction<?php  echo $leadAction['LeadAction']['id']; ?>"
													class="modal fade" role="dialog">
													<div class="modal-dialog">
					
														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Complete Action: <?php echo $leadAction['Action']['title'] ; ?></h4>
															</div>
															<div class="modal-body">
					        <?php	echo $this->Form->create('LeadAction',array('url'=>array('controller'=>'Leads', 'action'=>'completeAction',$lead['Lead']['id'],$leadAction['LeadAction']['id'] ))); ?>
						  	<?php echo $this->Form->input('action_completion_note',array('type'=>'textarea','class'=>'form-control','rows'=>'3','placeholder'=>'Action Note','label'=>false)); ?>
					    <input type="hidden" value="<?php echo $leadAction['Action']['id'] ; ?>" name="data[LeadAction][lead_action_id]" />
					  
					   
									 <?php // print_r($actionTitles); ?>
					  			
									<?php echo $this->Form->end(__('Complete')); ?>
					      </div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default"
																	data-dismiss="modal">Close</button>
															</div>
														</div>
					
													</div>
												</div>
												<?php } ?>
											
										</div>
										</div>
									<?php } else if(($leadAction['Action']['type']=='Follow Up')||($leadAction['Action']['type']=='Nibiru')){?>
								<?php  if($leadAction['LeadAction']['status']=='Completed'){?>
								<div class="client_action client action row">
											<div class="client_name  col-lg-2 right"><?php echo $this->request->data['Client']['company_name']; ?> </div>
											<div class="col-lg-10">
												<div class=" bubble_right right">
													<div class="action_title left"><?php echo $leadAction['Action']['closing_action']; ?></div>
												<div class="action_date left"><?php echo $leadAction['LeadAction']['action_completed_on'] ; ?></div>
												<div class="action_note left"><?php echo $leadAction['LeadAction']['action_completion_note'] ; ?></div>
											</div>
											</div>
										</div>
										<?php } ?>
										<div class="client_closing_action nibiru action row">
											<div class="client_name col-lg-2 left"><?php echo $this->request->data['User']['name']; ?> </div>
											<div class="col-lg-10"><div class="bubble_left left">
											<div class="action_title right"><?php echo $leadAction['Action']['title'] ; ?></div>
													<div class="action_date right"><?php echo $leadAction['LeadAction']['action_done_on'] ; ?></div>
													<div class="action_note right"><?php echo $leadAction['LeadAction']['action_note'] ; ?></div>
												</div>
												
												<?php  if($leadAction['LeadAction']['status'] =='Scheduled'){?>
											<div class="complete_btn right">
													<a href='#openAction<?php  echo $leadAction['LeadAction']['id']; ?>' class="complete_btn" data-toggle="modal">Open</a>
												</div>
												<!-- Modal -->
												<div
													id="openAction<?php  echo $leadAction['LeadAction']['id']; ?>"
													class="modal fade" role="dialog">
													<div class="modal-dialog">
					
														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Open Action: <?php echo $leadAction['Action']['title'] ; ?></h4>
															</div>
															<div class="modal-body">
					        <?php	echo $this->Form->create('LeadAction',array('url'=>array('controller'=>'Leads', 'action'=>'openAction',$lead['Lead']['id'],$leadAction['LeadAction']['id'] ))); ?>
						  	<?php echo $this->Form->input('action_note',array('type'=>'textarea','class'=>'form-control','rows'=>'3','placeholder'=>'Action Note','label'=>false)); ?>
					   <input type="hidden" value="<?php echo $leadAction['Action']['id'] ; ?>" name="data[LeadAction][lead_action_id]" />
					   
									 <?php // print_r($actionTitles); ?>
					  			
									<?php echo $this->Form->end(__('Complete')); ?>
					      </div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default"
																	data-dismiss="modal">Close</button>
															</div>
														</div>
					
													</div>
												</div>
												<?php } ?>
											<?php  if($leadAction['LeadAction']['status'] =='Open'){?>
											<div class="complete_btn right">
													<a href='#completeAction<?php  echo $leadAction['LeadAction']['id']; ?>' class="complete_btn" data-toggle="modal">Complete</a>
												</div>
												<!-- Modal -->
												<div
													id="completeAction<?php  echo $leadAction['LeadAction']['id']; ?>"
													class="modal fade" role="dialog">
													<div class="modal-dialog">
					
														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Close Action: <?php echo $leadAction['Action']['title'] ; ?></h4>
															</div>
															<div class="modal-body">
					        <?php	echo $this->Form->create('LeadAction',array('url'=>array('controller'=>'Leads', 'action'=>'completeAction',$lead['Lead']['id'],$leadAction['LeadAction']['id'] ))); ?>
						  	<?php echo $this->Form->input('action_completion_note',array('type'=>'textarea','class'=>'form-control','rows'=>'3','placeholder'=>'Action Note','label'=>false)); ?>
					    <input type="hidden" value="<?php echo $leadAction['Action']['id'] ; ?>" name="data[LeadAction][lead_action_id]" />
					  
					   
									 <?php // print_r($actionTitles); ?>
					  			
									<?php echo $this->Form->end(__('Complete')); ?>
					      </div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default"
																	data-dismiss="modal">Close</button>
															</div>
														</div>
					
													</div>
												</div>
												<?php } ?>
										</div>
										</div>
									<?php } else if($leadAction['Action']['type']=='Status'){?>
								
								<div class="status_action status action row">
											<div class=" col-lg-1 "></div>
											<div class="col-lg-10">
												<div class=" center_bubble">
													<div class="action_title center"><?php echo $leadAction['Action']['title']; ?>-<?php echo $leadAction['LeadAction']['action_done_on'] ; ?></div>
												<div class="action_note left"><?php echo $leadAction['LeadAction']['action_note'] ; ?></div>
											</div>
										</div>
										<div class=" col-lg-1 "></div>
										</div>
										
												<?php } ?>
					
				
				</div>
			<?php $count++; } ?>
		
			</div>


		</div>
	</div>
</div>

