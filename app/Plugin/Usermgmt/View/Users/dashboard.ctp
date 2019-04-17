<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<div class="container">
  <div class="row meeting">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    
    <h3>My Today`s Action Items <span class="pull-right"> <?php echo $this->Html->link(__('View All Done/Planned'),array('plugin'=>'','controller'=>'Leads','action' => 'doneToday'),array('class' => 'button btn btn-danger d')); ?> </span></h3>
     <h4>FUE and FUC Actions</h4>
     <ul>
         <?php foreach($TodaysPendingECActions as  $leadAction){ ?>
          <li ><?php echo $this->Html->link(__('Lead Id#'.$leadAction['LeadAction']['lead_id'].'-'.$leadAction['Action']['title']),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']));  ?> <?php echo $this->Html->link(__('View'),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']),array('class' => 'button btn btn-danger d')); ?> <small><?php echo 'Client# '.$leadAction['LeadAction']['company_name'];?></small> <br/><small>Next Action on:  <strong> <?php echo date('d M Y',strtotime($leadAction['LeadAction']['action_done_on']))?></strong></small></li>
      <?php  }?>
     </ul>
     <h4>Other Actions</h4>
    
       <ul>
         <?php   foreach($TodaysPendingActions as  $leadAction){ ?>
          <li ><?php echo $this->Html->link(__('Lead Id#'.$leadAction['LeadAction']['lead_id'].'-'.$leadAction['Action']['title']),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']));  ?> <?php echo $this->Html->link(__('View'),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']),array('class' => 'button btn btn-danger d')); ?> <small><?php echo 'Client# '.$leadAction['LeadAction']['company_name'];?></small> <br/><small>Next Action on:  <strong> <?php echo date('d M Y',strtotime($leadAction['LeadAction']['action_done_on']))?></strong></small></li>
      <?php  }?></ul>
     
     
      <h3>New Leads</h3>
      <ul>
        <?php   foreach($MyNewLeads as  $lead){ ?>
        <li ><?php echo $this->Html->link(__( $lead['Lead']['title']),array('controller'=>'Leads','action' => 'view', $lead['Lead']['id']));  ?> <?php echo $this->Html->link(__('View'),array('plugin'=>'','controller'=>'Leads','action' => 'view', $lead['Lead']['id']),array('class' => 'button btn btn-danger d')); ?> <small><?php echo 'Client# '.$lead['Client']['company_name'];?></small> </li>
      <?php  }?>
      </ul>
     <!-- <h3>Hot Leads</h3>
      <ul>
        <?php // foreach($MyHotLeads as  $hotLead){ ?>
        <li ><?php // echo $this->Html->link(__( $hotLead['Lead']['title']),array('controller'=>'Leads','action' => 'view', $hotLead['Lead']['id']));  ?> <?php echo $this->Html->link(__('View'),array('plugin'=>'','controller'=>'Leads','action' => 'view', $lead['Lead']['id']),array('class' => 'button btn btn-danger d')); ?> <small><?php echo 'Client# '.$hotLead['Client']['company_name'];?></small></li>
      <?php // }?>
      </ul>-->
     <h3>No Action Created</h3>
     <ul>
         <?php  if(!empty($NoActionCreated)){
         
          foreach($NoActionCreated as  $leadAction){ ?>
          <li ><?php echo $this->Html->link(__('Lead Id#'.$leadAction['LeadAction']['lead_id'].'-'.$leadAction['Action']['title']),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']));  ?> <?php echo $this->Html->link(__('View'),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']),array('class' => 'button btn btn-danger d')); ?> <small><?php echo 'Client# '.$leadAction['Client']['clientCompany'];?></small><br/><small>Last Action on:  <strong> <?php echo date('d M Y',strtotime($leadAction['LeadAction']['action_done_on']))?></strong></small> </li>
      <?php  } } ?>
     </ul>
      
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar">
    <h3>My Lead Stats</h3>
    <h6>Total Leads: <?php echo $MyTotalLeads;  ?></h6>
    <h6>Hot Leads: <?php echo $MyHotLeadsCount;  ?></h6>
    <br/><br/><br/><br/>
    
      <h3>Quick Links</h3>
      <div class="col-lg-6"><?php echo $this->Html->image('schedule.jpg', array('alt' =>'ge', 'border' => '0') ); ?>
        <div class="sub_heading">  <?php echo $this->Html->link('Add Leadss', array( 'controller' => 'Leads', 'action' => 'add')); ?></div>
      </div>
      <div class="col-lg-6"><?php echo $this->Html->image('Campaign.png', array('alt' =>'ge', 'border' => '0') ); ?> 
        <div class="sub_heading"> <?php echo $this->Html->link('Create Campaign', array( 'controller' => 'Campaigns', 'action' => 'add')); ?></div>
      </div>
      
      <div class="col-lg-6"> <?php echo $this->Html->image('addclient.jpg', array('alt' =>'ge', 'border' => '0') ); ?> 
        <div class="sub_heading">   <?php echo $this->Html->link('Add Client', array( 'controller' => 'Clients', 'action' => 'add')); ?></div>
      </div>
      <div class="col-lg-6"><?php echo $this->Html->image('addproject.jpg', array('alt' =>'ge', 'border' => '0') ); ?>  
        <div class="sub_heading"><?php echo $this->Html->link('Add Project', array( 'controller' => 'ProjectTypes', 'action' => 'add')); ?></div>
      </div>
      <div class="col-lg-6"><?php echo $this->Html->image('invoice.png', array('alt' =>'ge', 'border' => '0') ); ?>  
        <div class="sub_heading"><a href="past.php">Create Invoice</a></div>
      </div>
      <div class="col-lg-6"> <?php echo $this->Html->image('user.jpg', array('alt' =>'ge', 'border' => '0') ); ?> 
        <div class="sub_heading">  <?php echo $this->Html->link('View Leads', array( 'controller' => 'Leads', 'action' => 'index')); ?></div>
      </div>
    </div>
  </div>
</div>