<div class="portfolioLinks view">
<h2><?php echo __('Portfolio Link'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tags'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['tags']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tools Used'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['tools_used']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('For'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['for']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Live Status'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['live_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Type'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['work_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Currencies'); ?></dt>
		<dd>
			<?php echo $this->Html->link($portfolioLink['Currencies']['name'], array('controller' => 'currencies', 'action' => 'view', $portfolioLink['Currencies']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Countries'); ?></dt>
		<dd>
			<?php echo $this->Html->link($portfolioLink['Countries']['name'], array('controller' => 'countries', 'action' => 'view', $portfolioLink['Countries']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clients'); ?></dt>
		<dd>
			<?php echo $this->Html->link($portfolioLink['Clients']['id'], array('controller' => 'clients', 'action' => 'view', $portfolioLink['Clients']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nibiru Rating'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['nibiru_rating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Responsive'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['is_responsive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Live On'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['live_on']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($portfolioLink['PortfolioLink']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Portfolio Link'), array('action' => 'edit', $portfolioLink['PortfolioLink']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Portfolio Link'), array('action' => 'delete', $portfolioLink['PortfolioLink']['id']), array(), __('Are you sure you want to delete # %s?', $portfolioLink['PortfolioLink']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Portfolio Links'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Portfolio Link'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Currencies'), array('controller' => 'currencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Currencies'), array('controller' => 'currencies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Countries'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clients'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
