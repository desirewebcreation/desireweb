<div class="container">
<div class="col-lg-12">
<div class="campaigns view">
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6">
   
    <h3><?php echo __('Sales Doc'); ?></h3> </div> </div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($salesDoc['SalesDoc']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($salesDoc['SalesDoc']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($salesDoc['SalesDoc']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('For'); ?></dt>
		<dd>
			<?php echo h($salesDoc['SalesDoc']['for']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			 <?php if($salesDoc['SalesDoc']['url']!=""){ ?>
                <a href="<?php echo FULL_BASE_URL.$this->webroot ?>uploads/sales_doc/url/<?php echo $salesDoc['SalesDoc']['url']; ?>" target="_blank"  style="color:#000 !important;"> <?php echo h($salesDoc['SalesDoc']['url']); ?></a>
                  <?php } else{
                    echo h($salesDoc['SalesDoc']['url']);  
                  }?>
			&nbsp;
		</dd>
		<dt><?php echo __('Currencies'); ?></dt>
		<dd>
			<?php echo $this->Html->link($salesDoc['Currency']['name'], array('controller' => 'currencies', 'action' => 'view', $salesDoc['Currency']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Master Docs'); ?></dt>
		<dd>
			<?php echo $this->Html->link($salesDoc['MasterDoc']['id'], array('controller' => 'master_docs', 'action' => 'view', $salesDoc['MasterDoc']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($salesDoc['SalesDoc']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($salesDoc['SalesDoc']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($salesDoc['Createdby']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($salesDoc['Modifiedby']['name']); ?>
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
		<li><?php echo $this->Html->link(__('Edit Sales Doc'), array('action' => 'edit', $salesDoc['SalesDoc']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sales Doc'), array('action' => 'delete', $salesDoc['SalesDoc']['id']), array(), __('Are you sure you want to delete # %s?', $salesDoc['SalesDoc']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales Docs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sales Doc'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Currencies'), array('controller' => 'currencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Currencies'), array('controller' => 'currencies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Master Docs'), array('controller' => 'master_docs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Master Docs'), array('controller' => 'master_docs', 'action' => 'add')); ?> </li>
	</ul>
</div>
     */
