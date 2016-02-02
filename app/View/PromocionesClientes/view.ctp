<div class="promocionesClientes view">
<h2><?php echo __('Promociones Cliente'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($promocionesCliente['PromocionesCliente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Promociones'); ?></dt>
		<dd>
			<?php echo $this->Html->link($promocionesCliente['Promociones']['id'], array('controller' => 'promociones', 'action' => 'view', $promocionesCliente['Promociones']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($promocionesCliente['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $promocionesCliente['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usado'); ?></dt>
		<dd>
			<?php echo h($promocionesCliente['PromocionesCliente']['usado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Promociones Cliente'), array('action' => 'edit', $promocionesCliente['PromocionesCliente']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Promociones Cliente'), array('action' => 'delete', $promocionesCliente['PromocionesCliente']['id']), array(), __('Are you sure you want to delete # %s?', $promocionesCliente['PromocionesCliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Promociones Clientes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promociones Cliente'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Promociones'), array('controller' => 'promociones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promociones'), array('controller' => 'promociones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
