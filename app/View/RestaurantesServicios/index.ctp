<div class="restaurantesServicios index">
	<h2><?php echo __('Restaurantes Servicios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('restaurantes_rif'); ?></th>
			<th><?php echo $this->Paginator->sort('servicios_tipo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($restaurantesServicios as $restaurantesServicio): ?>
	<tr>
		<td><?php echo h($restaurantesServicio['RestaurantesServicio']['id']); ?>&nbsp;</td>
		<td><?php echo h($restaurantesServicio['RestaurantesServicio']['restaurantes_rif']); ?>&nbsp;</td>
		<td><?php echo h($restaurantesServicio['RestaurantesServicio']['servicios_tipo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $restaurantesServicio['RestaurantesServicio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $restaurantesServicio['RestaurantesServicio']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $restaurantesServicio['RestaurantesServicio']['id']), array(), __('Are you sure you want to delete # %s?', $restaurantesServicio['RestaurantesServicio']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Restaurantes Servicio'), array('action' => 'add')); ?></li>
	</ul>
</div>
