<div class="container">
<div class="col-lg-12">
<div class="campaigns view">
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Campaign Type'); ?></h3> </div> </div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($campaignType['CampaignType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($campaignType['CampaignType']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
</div>
<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Campaign Type'), array('action' => 'edit', $campaignType['CampaignType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Campaign Type'), array('action' => 'delete', $campaignType['CampaignType']['id']), array(), __('Are you sure you want to delete # %s?', $campaignType['CampaignType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>*/?>

