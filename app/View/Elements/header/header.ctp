<?php $name = $this->Session->read('UserAuth.User.first_name');
 $id = $this->Session->read('UserAuth.User.id');
?>
<script type="text/javascript">
$(document).ready(function(){
$('.sub-menu').parent().hover(function() {
    var menu = $(this).children("ul");
    var menupos = $(menu).offset();

    if (menupos.left + menu.width() > $(window).width()) {
        var newpos = -$(menu).width();
        menu.css({ left: newpos });    
    }
});

}); 
</script>


<div id="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-sm-5 logo">
        <?php echo  $this->Html->link( $this->Html->image("logo.png"), array('plugin' => '','controller'=>'', 'action' =>'dashboard'), array('escape' => false));?>
        <?php //echo $this->Html->image('logo.png', array('controller'=>'Leads','action'=>'dashboard','alt' =>'ge', 'border' => '0') ); 
        
           
        
        
        
        ?></div>
      <div class="col-lg-7 col-md-7 col-sm-7 nav">
        <div class="col-lg-5 col-sm-12 col-lg-offset-8">
          <div class="welcome"> <span>Welcome</span><span class="login_name"> <?php echo $name;?></span>| 
          
           <?php echo $this->Html->link('', array( 'plugin' => '','controller' => '', 'action' => 'logout'),array('class'=>'fa fa-power-off')); ?> |  	<a href='#addBug' data-toggle="modal"><i class="fa fa-bug"></i></a>
												
 <!--<i class="fa fa-power-off"></i> -->
          
         </div>
        </div>
        
        		<div id="addBug" class="modal fade" role="dialog">
													<div class="modal-dialog">
					
														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Report Bug</h4>
															</div>
															<div class="modal-body">
							<?php	echo $this->Form->create('Bug',array('url'=>array('plugin' => '','controller'=>'Bugs', 'action'=>'quickAdd' ))); ?>
						  	
					        <?php
			echo $this->Form->input('title',array('type'=>'text','class'=>'form-control','placeholder'=>'Title','label'=>false));
			echo $this->Form->input('description',array('type'=>'textarea','class'=>'form-control','placeholder'=>'Description','label'=>false));
			echo $this->Form->select('type',array(
					'Bug'=>'Bug','Feature Request'=>'Feature Request'),array('empty' => '(choose one)','class'=>'form-control','rows'=>'2','label'=>false));
			echo $this->Form->select('priority',array(
					'P1'=>'P1','P2'=>'P2','P3'=>'P3','P4'=>'P4'),array('empty' => '(choose one)','class'=>'form-control','rows'=>'2','label'=>false));
				
			?>
			
		
					   
									 <?php // print_r($actionTitles); ?>
					  			
									<?php echo $this->Form->end(__('Add Bug')); ?>
					      </div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default"
																	data-dismiss="modal">Close</button>
															</div>
														</div>
					
													</div>
												</div>
												<!-- Modal end-->
        
        <div class="row">
          <div class="col-lg-9 col-sm-9 col-lg-offset-3 nav">
            <nav role="navigation" class="navbar navbar-default navbar-static-top"> 
              
              <!-- Brand and toggle get grouped for better mobile display -->
              
              <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              
              <!-- Collection of nav links and other content for toggling -->
              
              <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                  <?php echo $this->Html->link('All Leads', array( 'plugin' => '','controller' => 'Leads', 'action' => 'index')/*,array('class' =>'dropdown-toggle','data-toggle'=>'dropdown', 'data-hover'=>'dropdown')*/); ?>
                  </li>
                   <li class="dropdown">
                  <?php echo $this->Html->link('My Leads', array( 'plugin' => '','controller' => 'Leads', 'action' => 'myLeads')/*,array('class' =>'dropdown-toggle','data-toggle'=>'dropdown', 'data-hover'=>'dropdown')*/); ?>
                  </li>
                  <li class="dropdown">
                  <?php echo $this->Html->link('Add Leads', array( 'plugin' => '','controller' => 'Leads', 'action' => 'add')/*,array('class' =>'dropdown-toggle','data-toggle'=>'dropdown', 'data-hover'=>'dropdown')*/); ?>
                   <!--<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">Add Lead<b class="caret"></b></a>-->
                   
                  </li>
                  <li class="dropdown"> <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primarybtn" href="#">Admin<b class="caret"></b></a>
                   <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
             
             <li class="dropdown-submenu">
             <?php echo $this->Html->link('Campaigns', array('plugin' => '','controller' => 'Campaigns', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Campaigns</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                   <?php echo $this->Html->link('Add', array('plugin' => '', 'controller' => 'Campaigns', 'action' => 'add')); ?>
                 <!-- <a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array('plugin' => '', 'controller' => 'Campaigns', 'action' => 'index')); ?>
                 <!-- <a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
              <li class="dropdown-submenu">
              <?php echo $this->Html->link('Project Type', array('plugin' => '', 'controller' => 'ProjectTypes', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Project Type</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                   <?php echo $this->Html->link('Add', array('plugin' => '', 'controller' => 'ProjectTypes', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array('plugin' => '', 'controller' => 'ProjectTypes', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
               <li class="dropdown-submenu">
               <?php echo $this->Html->link('Lead Actions', array( 'plugin' => '','controller' => 'Actions', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Lead Actions</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'Actions', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'Actions', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
             
              <li class="dropdown-submenu">
               <?php echo $this->Html->link('Status', array( 'plugin' => '','controller' => 'Statuses', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'Statuses', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'Statuses', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
                 <li class="dropdown-submenu">
               <?php echo $this->Html->link('Clients', array( 'plugin' => '','controller' => 'Clients', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'Clients', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'Clients', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
              
              
                   <li class="dropdown-submenu">
               <?php echo $this->Html->link('Countries', array( 'plugin' => '','controller' => 'Countries', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'Countries', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'Countries', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
              
              
              
                   <li class="dropdown-submenu">
               <?php echo $this->Html->link('Currencies', array( 'plugin' => '','controller' => 'Currencies', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'Currencies', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'Currencies', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
            
              
                   <li class="dropdown-submenu">
               <?php echo $this->Html->link('Users', array( 'plugin' => '','controller' => 'Users', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'Users', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'Users', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
              
                     <li class="dropdown-submenu">
               <?php echo $this->Html->link('CampaignTypes', array( 'plugin' => '','controller' => 'CampaignTypes', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'CampaignTypes', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'CampaignTypes', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
                <li class="dropdown-submenu">
               <?php echo $this->Html->link('Bugs', array( 'plugin' => '','controller' => 'Bugs', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'Bugs', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'Bugs', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
                  <li class="dropdown-submenu">
               <?php echo $this->Html->link('Sources', array( 'plugin' => '','controller' => 'Sources', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'Sources', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'Sources', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
               <li class="dropdown-submenu">
               <?php echo $this->Html->link('Master Docs', array( 'plugin' => '','controller' => 'MasterDocs', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'MasterDocs', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'MasterDocs', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
               <li class="dropdown-submenu">
               <?php echo $this->Html->link('Sales Docs', array( 'plugin' => '','controller' => 'SalesDocs', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'SalesDocs', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'SalesDocs', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              <li class="dropdown-submenu">
               <?php echo $this->Html->link('Portfolio Links', array( 'plugin' => '','controller' => 'PortfolioLinks', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'PortfolioLinks', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'PortfolioLinks', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              <li class="dropdown-submenu">
               <?php echo $this->Html->link('Client Types', array( 'plugin' => '','controller' => 'ClientTypes', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'ClientTypes', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'ClientTypes', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
               
                <li class="dropdown-submenu">
               <?php echo $this->Html->link('Lead Groups', array( 'plugin' => '','controller' => 'LeadGroups', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'LeadGroups', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'LeadGroups', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
                <li class="dropdown-submenu">
               <?php echo $this->Html->link('Reqs', array( 'plugin' => '','controller' => 'Reqs', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'Reqs', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'Reqs', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
              <li class="dropdown-submenu">
               <?php echo $this->Html->link('Regions', array( 'plugin' => '','controller' => 'Regions', 'action' => 'index')); ?>
               <!-- <a tabindex="-1" href="#">Status</a>-->
                <ul role="menu" class="dropdown-menu">
                  <li>
                  <?php echo $this->Html->link('Add', array( 'plugin' => '','controller' => 'Regions', 'action' => 'add')); ?>
                  <!--<a href="#">Add</a>-->
                  </li>
                  <li>
                  <?php echo $this->Html->link('Manage', array( 'plugin' => '','controller' => 'Regions', 'action' => 'index')); ?>
                  <!--<a href="#">Manage</a>-->
                  </li>
                </ul>
              </li>
              
            </ul>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>