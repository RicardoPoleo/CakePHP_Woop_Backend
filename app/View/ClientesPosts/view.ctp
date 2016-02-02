<div class="clientesPosts view">
<h2><?php echo __('Clientes Post'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientesPost['ClientesPost']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clientes'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientesPost['Clientes']['id'], array('controller' => 'clientes', 'action' => 'view', $clientesPost['Clientes']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($clientesPost['ClientesPost']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Clientes Post'), array('action' => 'edit', $clientesPost['ClientesPost']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Clientes Post'), array('action' => 'delete', $clientesPost['ClientesPost']['id']), array(), __('Are you sure you want to delete # %s?', $clientesPost['ClientesPost']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes Posts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clientes Post'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clientes'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
