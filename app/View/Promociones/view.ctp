<div class="promociones view">
<h2><?php echo __('Promocione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($promocione['Promocione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($promocione['Post']['id'], array('controller' => 'posts', 'action' => 'view', $promocione['Post']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h($promocione['Promocione']['fecha_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Fin'); ?></dt>
		<dd>
			<?php echo h($promocione['Promocione']['fecha_fin']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Promocione'), array('action' => 'edit', $promocione['Promocione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Promocione'), array('action' => 'delete', $promocione['Promocione']['id']), array(), __('Are you sure you want to delete # %s?', $promocione['Promocione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Promociones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promocione'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Clientes'); ?></h3>
	<?php if (!empty($promocione['Cliente'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Correo'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Apellido'); ?></th>
		<th><?php echo __('Nivel'); ?></th>
		<th><?php echo __('Dispositivo'); ?></th>
		<th><?php echo __('Huella'); ?></th>
		<th><?php echo __('Clave'); ?></th>
		<th><?php echo __('Estatus'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Sexo'); ?></th>
		<th><?php echo __('Nacimiento'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($promocione['Cliente'] as $cliente): ?>
		<tr>
			<td><?php echo $cliente['id']; ?></td>
			<td><?php echo $cliente['alias']; ?></td>
			<td><?php echo $cliente['correo']; ?></td>
			<td><?php echo $cliente['nombre']; ?></td>
			<td><?php echo $cliente['apellido']; ?></td>
			<td><?php echo $cliente['nivel']; ?></td>
			<td><?php echo $cliente['dispositivo']; ?></td>
			<td><?php echo $cliente['huella']; ?></td>
			<td><?php echo $cliente['clave']; ?></td>
			<td><?php echo $cliente['estatus']; ?></td>
			<td><?php echo $cliente['tipo']; ?></td>
			<td><?php echo $cliente['sexo']; ?></td>
			<td><?php echo $cliente['nacimiento']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clientes', 'action' => 'view', $cliente['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clientes', 'action' => 'edit', $cliente['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clientes', 'action' => 'delete', $cliente['id']), array(), __('Are you sure you want to delete # %s?', $cliente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
