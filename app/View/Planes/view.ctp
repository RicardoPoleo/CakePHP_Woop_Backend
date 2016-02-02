<div class="planes view">
<h2><?php echo __('Plane'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($plane['Plane']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($plane['Plane']['Nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Costo'); ?></dt>
		<dd>
			<?php echo h($plane['Plane']['costo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duracion'); ?></dt>
		<dd>
			<?php echo h($plane['Plane']['duracion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duracion Unidad'); ?></dt>
		<dd>
			<?php echo h($plane['Plane']['duracion_unidad']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Plane'), array('action' => 'edit', $plane['Plane']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Plane'), array('action' => 'delete', $plane['Plane']['id']), array(), __('Are you sure you want to delete # %s?', $plane['Plane']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Planes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plane'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Restaurantes'); ?></h3>
	<?php if (!empty($plane['Restaurante'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('RIF'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Correo'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Ciudad'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Precio Avg'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Pagina Web'); ?></th>
		<th><?php echo __('Clave'); ?></th>
		<th><?php echo __('Estatus'); ?></th>
		<th><?php echo __('Credito'); ?></th>
		<th><?php echo __('Debito'); ?></th>
		<th><?php echo __('Efectivo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($plane['Restaurante'] as $restaurante): ?>
		<tr>
			<td><?php echo $restaurante['RIF']; ?></td>
			<td><?php echo $restaurante['nombre']; ?></td>
			<td><?php echo $restaurante['correo']; ?></td>
			<td><?php echo $restaurante['estado']; ?></td>
			<td><?php echo $restaurante['ciudad']; ?></td>
			<td><?php echo $restaurante['direccion']; ?></td>
			<td><?php echo $restaurante['precio_avg']; ?></td>
			<td><?php echo $restaurante['descripcion']; ?></td>
			<td><?php echo $restaurante['pagina_web']; ?></td>
			<td><?php echo $restaurante['clave']; ?></td>
			<td><?php echo $restaurante['estatus']; ?></td>
			<td><?php echo $restaurante['credito']; ?></td>
			<td><?php echo $restaurante['debito']; ?></td>
			<td><?php echo $restaurante['efectivo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'restaurantes', 'action' => 'view', $restaurante['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'restaurantes', 'action' => 'edit', $restaurante['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'restaurantes', 'action' => 'delete', $restaurante['id']), array(), __('Are you sure you want to delete # %s?', $restaurante['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
