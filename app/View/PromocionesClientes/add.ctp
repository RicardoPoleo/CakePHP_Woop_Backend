<div class="promocionesClientes form">
<?php echo $this->Form->create('PromocionesCliente'); ?>
	<fieldset>
		<legend><?php echo __('Add Promociones Cliente'); ?></legend>
	<?php
		echo $this->Form->input('promociones_id');
		echo $this->Form->input('cliente_id');
		echo $this->Form->input('usado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Promociones Clientes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Promociones'), array('controller' => 'promociones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promociones'), array('controller' => 'promociones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
