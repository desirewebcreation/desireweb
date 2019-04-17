<div class="container">
<div class="col-lg-12">
<div class="campaigns">
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Lead Group'); ?></h3> </div> </div>
<?php /*?><div class="col-lg-8 col-sm-6">

	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Type'), array('action' => 'edit', $projectType['ProjectType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Type'), array('action' => 'delete', $projectType['ProjectType']['id']), array(), __('Are you sure you want to delete # %s?', $projectType['ProjectType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Type'), array('action' => 'add')); ?> </li>
	</ul>
</div><?php */?>


	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($LeadGroup['LeadGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($LeadGroup['LeadGroup']['description']); ?>
			&nbsp;
		</dd>
	</dl>
    </div>
</div>	
</div>