<div class="container">
<div class="col-lg-12">
<div class="campaigns">
<div class="row meeting-tittle">
<div class="col-lg-3 col-sm-6"><h3><?php echo __('Campaign'); ?></h3> </div></div>


<?php /*<div class="col-lg-8 col-sm-6">

	<ul>
		<li><?php echo $this->Html->link(__('Edit Campaign'), array('action' => 'edit', $campaign['Campaign']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Campaign'), array('action' => 'delete', $campaign['Campaign']['id']), array(), __('Are you sure you want to delete # %s?', $campaign['Campaign']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Types'), array('controller' => 'campaign_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Types'), array('controller' => 'campaign_types', 'action' => 'add')); ?> </li>
	</ul>
</div>*/

//pr($campaign);
 ?>





	<dl>
		<dt><?php echo __('Id'); 	 ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campaign Types'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaign['CampaignType']['description'], array('controller' => 'campaign_types', 'action' => 'view', $campaign['CampaignType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($campaign['Status']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div></div>