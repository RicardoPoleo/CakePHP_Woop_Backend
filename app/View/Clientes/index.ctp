<div class="clientes index">
	<h2><?php echo __('Clientes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo "Alias"; ?></th>
			<th><?php echo "Correo"; ?></th>
			<th><?php echo "Nombre"; ?></th>
			<th><?php echo "Apellido"; ?></th>
			<th><?php echo "Nivel"; ?></th>
			<th><?php echo "Dispositivo"; ?></th>
			<th><?php echo "Huella"; ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr-->
	<?php foreach ($clientes as $cliente): ?>
	<tr>
		<td><?php echo h($cliente['Cliente']['alias']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['correo']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['nivel']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['dispositivo']); ?>&nbsp;</td>
		<td><?php echo h($cliente['Cliente']['huella']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cliente['Cliente']['correo'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cliente['Cliente']['correo'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cliente['Cliente']['correo']), array(), __('Are you sure you want to delete # %s?', $cliente['Cliente']['correo'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<!--div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div-->
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cliente'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Restaurantes'), array('Controller' =>'Restaurantes', 'action' => 'index')); ?></li>
	</ul>
</div>
