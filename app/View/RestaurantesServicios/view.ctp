<div class="restaurantesServicios view">
<h2><?php echo __('Restaurantes Servicio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($restaurantesServicio['RestaurantesServicio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurantes Rif'); ?></dt>
		<dd>
			<?php echo h($restaurantesServicio['RestaurantesServicio']['restaurantes_rif']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Servicios Tipo'); ?></dt>
		<dd>
			<?php echo h($restaurantesServicio['RestaurantesServicio']['servicios_tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Restaurantes Servicio'), array('action' => 'edit', $restaurantesServicio['RestaurantesServicio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Restaurantes Servicio'), array('action' => 'delete', $restaurantesServicio['RestaurantesServicio']['id']), array(), __('Are you sure you want to delete # %s?', $restaurantesServicio['RestaurantesServicio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurantes Servicios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurantes Servicio'), array('action' => 'add')); ?> </li>
	</ul>
</div>
