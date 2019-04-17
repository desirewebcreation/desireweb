<?php  //include 'header.php';?>
<div class="container">
  <div class="row meeting">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Hot Leads</h3>
      <ul>
        <?php   foreach($MyCurrentHotLeads as  $lead){ ?>
        <li ><?php echo $this->Html->link(__( $lead['Lead']['title']),array('controller'=>'Leads','action' => 'view', $lead['Lead']['id']));  ?> <?php echo $this->Html->link(__('View'),array('controller'=>'Leads','action' => 'view', $lead['Lead']['id']),array('class' => 'button btn btn-danger d')); ?> </li>
      <?php  }?>
      </ul>
    <!--  <h3>Action Items</h3>
      <ul>
        <li><a href="meeting-tittle.php">Vestibulum interdum, enim sit amet pellentesque</a><button type="button" class="btn btn-danger">View</button>  </li>
        <li><a href="meeting-tittle.php">Vestibulum interdum, enim sit amet pellentesque</a><button type="button" class="btn btn-danger">View</button> </li>
        <li><a href="meeting-tittle.php">Vestibulum interdum, enim sit amet pellentesque</a><button type="button" class="btn btn-danger">View</button>  </li>
      </ul>-->
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar">
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