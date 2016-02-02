<div class="clientesComidas view">
<h2><?php echo __('Clientes Comida'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientesComida['ClientesComida']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente Correo'); ?></dt>
		<dd>
			<?php echo h($clientesComida['ClientesComida']['cliente_correo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comida'); ?></dt>
		<dd>
			<?php echo h($clientesComida['ClientesComida']['comida']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Clientes Comida'), array('action' => 'edit', $clientesComida['ClientesComida']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Clientes Comida'), array('action' => 'delete', $clientesComida['ClientesComida']['id']), array(), __('Are you sure you want to delete # %s?', $clientesComida['ClientesComida']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes Comidas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clientes Comida'), array('action' => 'add')); ?> </li>
	</ul>
</div>
