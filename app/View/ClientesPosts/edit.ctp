<div class="clientesPosts form">
<?php echo $this->Form->create('ClientesPost'); ?>
	<fieldset>
		<legend><?php echo __('Edit Clientes Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('clientes_id');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ClientesPost.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ClientesPost.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes Posts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clientes'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
