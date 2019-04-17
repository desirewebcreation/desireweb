<div class="container">
<div class="col-lg-12">
<div class="leadProjectTypes view">
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('Lead Project Type'); ?></h3> </div> </div>


<?php /*?><div class="col-lg-8 col-sm-6">

	<ul>
		<li><?php echo $this->Html->link(__('Edit Lead Project Type'), array('action' => 'edit', $leadProjectType['LeadProjectType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Lead Project Type'), array('action' => 'delete', $leadProjectType['LeadProjectType']['id']), array(), __('Are you sure you want to delete # %s?', $leadProjectType['LeadProjectType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lead Project Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lead Project Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leads'), array('controller' => 'leads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leads'), array('controller' => 'leads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Types'), array('controller' => 'project_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Types'), array('controller' => 'project_types', 'action' => 'add')); ?> </li>
	</ul>
</div><?php */?>


	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($leadProjectType['LeadProjectType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Leads'); ?></dt>
		<dd>
			<?php echo $this->Html->link($leadProjectType['Lead']['title'], array('controller' => 'leads', 'action' => 'view', $leadProjectType['Lead']['title'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Types'); ?></dt>
		<dd>
			<?php echo $this->Html->link($leadProjectType['ProjectType']['description'], array('controller' => 'project_types', 'action' => 'view', $leadProjectType['ProjectType']['description'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($leadProjectType['LeadProjectType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($leadProjectType['LeadProjectType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>

</div></div>
</div>
