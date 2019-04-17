<script>
    $(document).ready(function() {
        $("#add_action").click(function() {
            $("div.add_action_form").slideToggle(1000);
        });

        $("#datepickerAction").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
        });
    });

</script>

<?php
$current_date = date('Y-m-d');

?>
<div class="container">
    <div class="leads view">

        <div class="row page_header">
            <div class="col-lg-9">
                <div>
                    <h2 class="lead_title"><?php echo '#' . h($lead['Lead']['id']); ?>-<?php echo h($lead['Lead']['title']); ?></h2>
                </div>
                <div class="lead_meta">
                    
                    Created on:<b><?php echo h($lead['Lead']['created']); ?></b>,
                    Created by:<b><?php echo h($lead['Createdby']['first_name']); ?></b>,
                    Last Modified on:<b><?php echo h($lead['Lead']['modified']); ?></b>,
                    Last Modified by:<b><?php echo h($lead['Modifiedby']['first_name']); ?></b>
                </div>
            </div>
            <div class="col-lg-3 pull-right"><?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>', array('action' => 'edit', $lead['Lead']['id']), array('escape' => false, 'class' => 'control-btn', 'title' => 'Edit Lead')); ?>
            </div>
        </div>


        <ul class="nav nav-pills">

            <li class="active"><a data-toggle="pill" href="#lead_details">Details</a></li>
            <li><a data-toggle="pill" href="#actions">Actions</a></li>
        </ul>
        <div class="tab-content col-lg-12">
            <div id="lead_details" class="tab-pane fade in active">
                <div class="row top-row">
                    <div class="col-lg-4 top-box">
                        <h2>
                            Owner: <b><?php echo $lead['User']['first_name']; ?></b>
                        </h2>
                    </div>
                    <div class="col-lg-4 top-box">
                        <h2>
                            Status: <b><?php echo $lead['Status']['description']; ?></b>
                        </h2> <?php if ($lead['Status']['description'] == 'Lost') echo 'Reason: ' . $lead['Lead']['reason_for_leave']; ?></div>
                    <div class="col-lg-4 top-box">
                        <h2>
                            Price: <b><?php echo $lead['Currency']['symbol'] . $lead['Lead']['expected_price']; ?></b>
                        </h2>
                    </div>
                </div>
                <div class="row  other_details">
                    <div class="col-lg-4">
                        <h2><?php echo $lead['Client']['company_name']; ?></h2>
                        <div>P:<?php echo $lead['Client']['phone']; ?>, E: <?php echo $lead['Client']['email_address']; ?></div>
                        <div><?php echo $lead['Country']['name']; ?></div>
                    </div>
                    <div class="col-lg-4">
                        <h4>
                            Campaign: <b><?php echo $lead['Campaign']['title']; ?></b>
                        </h4>
                        <h4>
                            Source: <b><?php echo $lead['Source']['description']; ?></b>
                        </h4>
                        <h4>
                            Expected Start Date: <b><?php echo $lead['Lead']['expected_start_date']; ?></b>
                        </h4>
                        <h4>
                            Region: <b><?php echo $lead['Region']['description']; ?></b>
                        </h4>
                        <h4>
                            Lead Group: <b><?php echo $lead['LeadGroup']['description']; ?></b>
                        </h4>
                        <h4>
                            Reqs: <b>
                                <?php
                                foreach ($lead['Req'] as $req) {
                                    $reqarray[] = $req['description'];
                                }
                                echo implode(', ', $reqarray);
                                ?>
                            </b>
                        </h4>
                    </div>
                    <div class="col-lg-4">
                        <h2>Tags</h2><?php echo h($lead['Lead']['tag']); ?></div>
                </div>
                <div class="row other_details col-lg-12">
                    <h2>Requirements</h2><?php echo h($lead['Lead']['requirement']); ?></div>
                <div class="row other_details col-lg-12">
                    <div class="col-lg-6">
                        <h2>Scope</h2><?php echo h($lead['Lead']['scope']); ?></div>
                    <div class="col-lg-6">
                        <h2>Quotation</h2><?php echo h($lead['Lead']['quotation']); ?></div>
                </div>


            </div>

            <div id="actions" class="tab-pane fade">
                <div class="row">	<div class="col-lg-5"></div><div class="col-lg-2" style="text-align:center;"><button id="add_action" value="Add Action">+ Add New Action</button></div><div class="col-lg-5"></div></div>
                <div class="add_action_form" style="display: none;">
                    <h2>Add Action</h2>
<?php echo $this->Form->create('LeadAction', array('url' => array('controller' => 'Leads', 'action' => 'saveAction', $lead['Lead']['id']))); ?>
                    <?php $url = $this->Html->url(array('controller' => 'Leads', 'action' => 'action_type_actions_ajax', 'ext' => 'json')); ?>


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
                    echo $this->Form->select('lead_action_id', $actionTitles, array(
                        'class' => 'form-control',
                        'id' => 'actionTitles',
                        'empty' => 'Choose Action',
                        'label' => false
                    ));
                    ?>
                    <?php
                    echo $this->Form->select('status', array(
                        'Open' => 'Open',
                        'Scheduled' => 'Scheduled'
                            ), array(
                        'class' => 'form-control',
                        'rows' => '2',
                        'label' => false,
                        'id' => 'status',
                        'empty' => false
                    ));
                    ?>


                    <?php
                    echo $this->Form->select('owner_id', $owners, array(
                        'class' => 'form-control',
                        'id' => 'actionOwner',
                        'empty' => 'Choose Owner'
                    ));
                    ?>

                    <?php
                    echo $this->Form->input('action_done_on', array('id' => 'datepickerAction', 'type' => 'text', 'class' => 'form-control', 'label' => false, 'value' => $current_date, 'readonly', 'empty' => false));
                    ?>
                    <?php
                    echo $this->Form->input('action_note', array('type' => 'textarea', 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Action Note', 'label' => false));
                    ?>


                    <?php // print_r($actionTitles); ?>

                    <?php echo $this->Form->end(__('Submit')); ?>


                </div>
                    <?php $count = 0;
                    foreach ($actions as $leadAction) { ?>
                    <div class="individual_action <?php if ($count % 2 == 0) echo "even"; else echo "odd"; ?>">

                    <?php if ($leadAction['Action']['type'] == 'Client') { ?>
        <?php if ($leadAction['LeadAction']['status'] == 'Completed') { ?>
                                <div class="client_closing_action nibiru action row">
                                    <div class="client_name col-lg-2 left"><?php echo $lead['User']['name']; ?> </div>
                                    <div class="col-lg-10"><div  class="bubble_left left">
                                            <div class="action_title left"><?php echo $leadAction['Action']['closing_action']; ?></div>
                                            <div class="action_date left"><?php echo $leadAction['LeadAction']['action_completed_on']; ?></div>
                                            <div class="action_note left"><?php echo nl2br(h($leadAction['LeadAction']['action_completion_note'])); ?></div>
                                        </div>
                                    </div>
                                </div>
        <?php } ?>
                            <div class="client_action client action row">
                                <div class="client_name  col-lg-2 right"><?php echo $lead['Client']['company_name']; ?> </div>
                                <div class="col-lg-10">
                                    <div class=" bubble_right right">
                                        <div class="action_title right"><?php echo $leadAction['Action']['title']; ?></div>
                                        <div class="action_date right"><?php echo $leadAction['LeadAction']['action_done_on']; ?></div>
                                        <div class="action_note right"><?php echo nl2br(h($leadAction['LeadAction']['action_note'])); ?></div>
                                    </div>
        <?php if ($leadAction['LeadAction']['status'] == 'Scheduled') { ?>
                                        <div class="complete_btn right">
                                            <a href='#openAction<?php echo $leadAction['LeadAction']['id']; ?>' class="complete_btn" data-toggle="modal">Open</a>
                                             <a href='#editAction' class="complete_btn" data-toggle="modal" onclick="javascript:openEdit(<?php echo $leadAction['LeadAction']['id'];?>)">Edit</a>
                                        </div>
                                        <!-- Modal -->
                                        <div id="openAction<?php echo $leadAction['LeadAction']['id']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Open Action: <?php echo $leadAction['Action']['title']; ?></h4>
                                                    </div>
                                                    <div class="modal-body">
            <?php echo $this->Form->create('LeadAction', array('url' => array('controller' => 'Leads', 'action' => 'openAction', $lead['Lead']['id'], $leadAction['LeadAction']['id']))); ?>
            <?php echo $this->Form->input('action_note', array('type' => 'textarea', 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Action Note', 'label' => false)); ?>
                                                        <input type="hidden" value="<?php echo $leadAction['Action']['id']; ?>" name="data[LeadAction][lead_action_id]" />


            <?php // print_r($actionTitles);  ?>

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
        <?php if ($leadAction['LeadAction']['status'] == 'Open') { ?>
                                        <div class="complete_btn right">
                                            <a href='#completeAction<?php echo $leadAction['LeadAction']['id']; ?>' class="complete_btn" data-toggle="modal">Complete</a>
                                             <a href='#editAction' class="complete_btn" data-toggle="modal" onclick="javascript:openEdit(<?php echo $leadAction['LeadAction']['id'];?>)">Edit</a>
                                        </div>
                                        <!-- Modal -->
                                        <div
                                            id="completeAction<?php echo $leadAction['LeadAction']['id']; ?>"
                                            class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Complete Action: <?php echo $leadAction['Action']['title']; ?></h4>
                                                    </div>
                                                    <div class="modal-body">
            <?php echo $this->Form->create('LeadAction', array('url' => array('controller' => 'Leads', 'action' => 'completeAction', $lead['Lead']['id'], $leadAction['LeadAction']['id']))); ?>
            <?php echo $this->Form->input('action_completion_note', array('type' => 'textarea', 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Action Note', 'label' => false)); ?>
                                                        <input type="hidden" value="<?php echo $leadAction['Action']['id']; ?>" name="data[LeadAction][lead_action_id]" />


            <?php // print_r($actionTitles);  ?>

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
    <?php } else if (($leadAction['Action']['type'] == 'Follow Up') || ($leadAction['Action']['type'] == 'Nibiru')) { ?>
        <?php if ($leadAction['LeadAction']['status'] == 'Completed') { ?>
                                <div class="client_action client action row">
                                    <div class="client_name  col-lg-2 right"><?php echo $lead['Client']['company_name']; ?> </div>
                                    <div class="col-lg-10">
                                        <div class=" bubble_right right">
                                            <div class="action_title left"><?php echo $leadAction['Action']['closing_action']; ?></div>
                                            <div class="action_date left"><?php echo $leadAction['LeadAction']['action_completed_on']; ?></div>
                                            <div class="action_note left"><?php echo nl2br(h($leadAction['LeadAction']['action_completion_note'])); ?></div>
                                        </div>
                                    </div>
                                </div>
        <?php } ?>
                            <div class="client_closing_action nibiru action row">
                                <div class="client_name col-lg-2 left"><?php echo $lead['User']['name']; ?> </div>
                                <div class="col-lg-10"><div class="bubble_left left">
                                        <div class="action_title right"><?php echo $leadAction['Action']['title']; ?></div>
                                        <div class="action_date right"><?php echo $leadAction['LeadAction']['action_done_on']; ?></div>
                                        <div class="action_note right"><?php echo nl2br(h($leadAction['LeadAction']['action_note'])); ?></div>
                                    </div>

        <?php if ($leadAction['LeadAction']['status'] == 'Scheduled') { ?>
                                        <div class="complete_btn right">
                                            <a href='#openAction<?php echo $leadAction['LeadAction']['id']; ?>' class="complete_btn" data-toggle="modal">Open</a>
                                             <a href='#editAction' class="complete_btn" data-toggle="modal" onclick="javascript:openEdit(<?php echo $leadAction['LeadAction']['id'];?>)">Edit</a>
                                        </div>
                                        <!-- Modal -->
                                        <div id="openAction<?php echo $leadAction['LeadAction']['id']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Open Action: <?php echo $leadAction['Action']['title']; ?></h4>
                                                    </div>
                                                    <div class="modal-body">
            <?php echo $this->Form->create('LeadAction', array('url' => array('controller' => 'Leads', 'action' => 'openAction', $lead['Lead']['id'], $leadAction['LeadAction']['id']))); ?>
            <?php echo $this->Form->input('action_note', array('type' => 'textarea', 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Action Note', 'label' => false)); ?>
                                                        <input type="hidden" value="<?php echo $leadAction['Action']['id']; ?>" name="data[LeadAction][lead_action_id]" />

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
        <?php if ($leadAction['LeadAction']['status'] == 'Open') { ?>
                                        <div class="complete_btn right">
                                            <a href='#completeAction<?php echo $leadAction['LeadAction']['id']; ?>' class="complete_btn" data-toggle="modal">Complete</a>
                                            <a href='#editAction' class="complete_btn" data-toggle="modal" onclick="javascript:openEdit(<?php echo $leadAction['LeadAction']['id'];?>)">Edit</a>
                                        </div>
                                        <!-- Modal -->
                                        <div id="completeAction<?php echo $leadAction['LeadAction']['id']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Close Action: <?php echo $leadAction['Action']['title']; ?></h4>
                                                    </div>
                                                    <div class="modal-body">
            <?php echo $this->Form->create('LeadAction', array('url' => array('controller' => 'Leads', 'action' => 'completeAction', $lead['Lead']['id'], $leadAction['LeadAction']['id']))); ?>
            <?php echo $this->Form->input('action_completion_note', array('type' => 'textarea', 'class' => 'form-control', 'rows' => '3', 'placeholder' => 'Action Note', 'label' => false)); ?>
                                                        <input type="hidden" value="<?php echo $leadAction['Action']['id']; ?>" name="data[LeadAction][lead_action_id]" />


            <?php // print_r($actionTitles);  ?>

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
                                <?php } else if ($leadAction['Action']['type'] == 'Status') { ?>

                            <div class="status_action status action row">
                                <div class=" col-lg-1 "></div>
                                <div class="col-lg-10">
                                    <div class=" center_bubble">
                                        <div class="action_title center"><?php echo $leadAction['Action']['title']; ?>-<?php echo $leadAction['LeadAction']['action_done_on']; ?></div>
                                        <div class="action_note left"><?php echo nl2br(h($leadAction['LeadAction']['action_note'])); ?></div>
                                    </div>
                                </div>
                                <div class=" col-lg-1 "></div>
                            </div>

    <?php } ?>


                    </div>
    <?php $count++;
} ?>
                 <!-- Modal -->
                                        <div id="editAction" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Edit Action: </h4>
                                                    </div>
                                                    <div class="modal-body">
            <?php echo $this->Form->create('LeadAction', array('url' => array('controller' => 'Leads', 'action' => 'editAction'))); ?>
         <?php
                    echo $this->Form->select('owner_id', $owners, array(
                        'class' => 'form-control',
                        'id' => 'editactionOwner',
                        'empty' => 'Choose Owner',
                        'required'=>'required',
                    ));
         ?>
            <?php echo $this->Form->input('action_note', array('type' => 'textarea', 'id' => 'editActionNote','class' => 'form-control', 'rows' => '3','required'=>'required','label' => false)); ?>
                                                        <input id="editLeadActionId" type="hidden" value="" name="data[LeadAction][id]" required="required"/>
                                                         <input id="editLeadId" type="hidden" value="" name="data[LeadAction][lead_id]" required="required"/>

                                                        <?php // print_r($actionTitles); ?>

                                                        <?php echo $this->Form->end(__('Update')); ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
            </div>


        </div>
    </div>
</div>


<script>
function openEdit(e){
    var editActionId = e;
       
        $.ajax({
            type: 'get',
            url:'/Leads/ajaxeditaction/'+editActionId,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            },
            success: function(response) {
            
              var obj = jQuery.parseJSON(response);
                             
                     var actionId = obj.id;
                     var actionLeadId = obj.lead_id;
                     var ownerId = obj.owner_id;
                     var actionNote = obj.action_note;
                     
                    $("#editLeadActionId").val(actionId); 
                    $("#editLeadId").val(actionLeadId); 
                    $("select#editactionOwner").val(ownerId);
                    $("#editActionNote").val(actionNote);
                      
            },
            error: function(e) {
                alert("An error occurred");
                console.log(e);
            }
        });


return false;
}
$('#editAction').on('hidden.bs.modal', function () {
  $("#editLeadId").val(""); 
  $("#editLeadActionId").val(""); 
  $("select#editactionOwner").val("");
  $("#editActionNote").val("");
})
</script>

