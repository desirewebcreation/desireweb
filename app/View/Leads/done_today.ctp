<script>
    $(document).ready(function() {
          $("#datepickerAction").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
        });
    });

</script>

<?php

$requestDate = isset ( $this->request->query ['action_done_on'] ) ? $this->request->query ['action_done_on'] : '';
 if ($requestDate != "") {
                 $current_date =  $requestDate;
                 }else{
                    $current_date =  date('Y-m-d');
                 }

?>

<style>
    .done-today li{
        padding-bottom: 5px; 
    }
    .done-today-h3{
      padding: 0px 0px 20px 0px  
    }
</style>
<div class="container">
  <div class="row">
   <div class="col-lg-12"> 
       <div class="row" style="text-align: center;">
           <div class="col-md-2" style="margin: 0px auto; float: none;"> 
        <?php echo $this->Form->create('LeadAction', array('type'=>'get','url' => array('controller' => 'Leads','action' => 'doneToday'))); ?>
        <?php echo $this->Form->input('action_done_on', array('id' => 'datepickerAction', 'type' => 'text', 'class' => 'form-control', 'label' => false, 'value' => $current_date, 'readonly', 'empty' => false)); ?>                            
        <?php echo $this->Form->end(__('Find')); ?>
       </div>
         </div>
       <h3 class="done-today-h3">My Today`s Done Actions </h3>
       
      <?php if(!empty($doneTodayFUCandFUE)){?>
        <h4>FUE and FUC Actions</h4>
        <ul class="done-today">
         <?php   foreach($doneTodayFUCandFUE as  $leadAction){
             $FUprojectTypeArray = array();
             foreach ($leadAction ['LeadAction']['project_type'] as $fuprojecttypeValue){
                $FUprojectTypeArray[] =  $fuprojecttypeValue['ProjectType']['description'];  
             }
          ?>
            <li ><?php echo $this->Html->link(__('Lead Id#'.$leadAction['LeadAction']['lead_id'].'-'.$leadAction['Action']['actionTitle']),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']));  ?> <?php echo $this->Html->link(__('View'),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']),array('class' => 'button btn btn-danger d')); ?> 
           <br/><small><?php echo '<b>Client#</b> '.$leadAction['Client']['clientCompany'];?></small> 
            <br/>
            <small><?php echo '<b>Action Note#</b> '.nl2br($leadAction['LeadAction']['action_note']);?></small><br/>
            <small><?php echo '<b>Lead Status#</b> '.$leadAction['Statuse']['statusTitle'];?></small><br/>
            <small><?php echo '<b>User#</b> '.$leadAction[0]['userFullName'];?></small><br/>
            <small><?php echo '<b>Project Types#</b> '.  implode(', ', $FUprojectTypeArray);?></small>
            </li>
      <?php  }?>
     </ul>
      <?php } ?>
        
    <?php  if(!empty($doneTodayOthers)){?>
     <h4>Other Actions</h4>
    
     <ul class="done-today">
         <?php   foreach($doneTodayOthers as  $leadAction){ 
            $projectTypeArray = array();
             foreach ($leadAction ['LeadAction']['project_type'] as $projecttypeValue){
                $projectTypeArray[] =  $projecttypeValue['ProjectType']['description'];  
             }
           
          ?>
          <li ><?php echo $this->Html->link(__('Lead Id#'.$leadAction['LeadAction']['lead_id'].'-'.$leadAction['Action']['actionTitle']),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']));  ?> <?php echo $this->Html->link(__('View'),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']),array('class' => 'button btn btn-danger d')); ?> 
              <br/><small><?php echo '<b>Client#</b> '.$leadAction['Client']['clientCompany'];?></small>
          <br/>
          <small><?php echo '<b>Action Note#</b> '.nl2br($leadAction['LeadAction']['action_note']);?></small><br/>
            <small><?php echo '<b>Lead Status#</b> '.$leadAction['Statuse']['statusTitle'];?></small><br/>
            <small><?php echo '<b>User#</b> '.$leadAction[0]['userFullName'];?></small><br/>
            <small><?php echo '<b>Project Types#</b> '.  implode(', ', $projectTypeArray);?></small>
          </li>
      <?php  }?></ul>
    <?php }?>
    </div>
</div>
    <hr>
      <div class="row">
   <div class="col-lg-12"> 
       <h3 class="done-today-h3">My Today`s Planned Actions </h3>
       <?php if(!empty($TodaysPlanedECActions)){?>
         <h4>FUE and FUC Actions</h4>
     <ul class="done-today">
         <?php   foreach($TodaysPlanedECActions as  $leadAction){ ?>
          <li ><?php echo $this->Html->link(__('Lead Id#'.$leadAction['LeadAction']['lead_id'].'-'.$leadAction['Action']['title']),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']));  ?> <?php echo $this->Html->link(__('View'),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']),array('class' => 'button btn btn-danger d')); ?> <small><?php echo 'Client# '.$leadAction['LeadAction']['company_name'];?></small> </li>
      <?php  }?>
     </ul>
       <?php }?>
      <?php if(!empty($TodaysPlanedActions)){?>   
     <h4>Other Actions</h4>
    
       <ul class="done-today">
         <?php   foreach($TodaysPlanedActions as  $leadAction){ ?>
          <li ><?php echo $this->Html->link(__('Lead Id#'.$leadAction['LeadAction']['lead_id'].'-'.$leadAction['Action']['title']),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']));  ?> <?php echo $this->Html->link(__('View'),array('plugin'=>'','controller'=>'Leads','action' => 'view', $leadAction['LeadAction']['lead_id']),array('class' => 'button btn btn-danger d')); ?> <small><?php echo 'Client# '.$leadAction['LeadAction']['company_name'];?></small> </li>
      <?php  }?></ul>
      <?php } ?>
    </div>
</div>
</div>