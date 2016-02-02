<div class="pagos view">
<h2><?php echo __('Pago'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pago['Pago']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurante'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pago['Restaurante'][''], array('controller' => 'restaurantes', 'action' => 'view', $pago['Restaurante']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monto'); ?></dt>
		<dd>
			<?php echo h($pago['Pago']['monto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($pago['Pago']['fecha']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pago'), array('action' => 'edit', $pago['Pago']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pago'), array('action' => 'delete', $pago['Pago']['id']), array(), __('Are you sure you want to delete # %s?', $pago['Pago']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pago'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurantes Planes'), array('controller' => 'restaurantes_planes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurantes Plane'), array('controller' => 'restaurantes_planes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Restaurantes Planes'); ?></h3>
	<?php if (!empty($pago['RestaurantesPlane'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Plan Id'); ?></th>
		<th><?php echo __('Restaurante Id'); ?></th>
		<th><?php echo __('Pago Id'); ?></th>
		<th><?php echo __('Fecha Activacion'); ?></th>
		<th><?php echo __('Fecha Vencimiento'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pago['RestaurantesPlane'] as $restaurantesPlane): ?>
		<tr>
			<td><?php echo $restaurantesPlane['id']; ?></td>
			<td><?php echo $restaurantesPlane['plan_id']; ?></td>
			<td><?php echo $restaurantesPlane['restaurante_id']; ?></td>
			<td><?php echo $restaurantesPlane['pago_id']; ?></td>
			<td><?php echo $restaurantesPlane['fecha_activacion']; ?></td>
			<td><?php echo $restaurantesPlane['fecha_vencimiento']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'restaurantes_planes', 'action' => 'view', $restaurantesPlane['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'restaurantes_planes', 'action' => 'edit', $restaurantesPlane['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'restaurantes_planes', 'action' => 'delete', $restaurantesPlane['id']), array(), __('Are you sure you want to delete # %s?', $restaurantesPlane['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Restaurantes Plane'), array('controller' => 'restaurantes_planes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
