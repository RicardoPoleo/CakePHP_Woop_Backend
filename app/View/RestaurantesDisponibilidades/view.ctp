<div class="restaurantesDisponibilidades view">
<h2><?php echo __('Restaurantes Disponibilidade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($restaurantesDisponibilidade['RestaurantesDisponibilidade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurantes Rif'); ?></dt>
		<dd>
			<?php echo h($restaurantesDisponibilidade['RestaurantesDisponibilidade']['restaurantes_rif']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disponibilidades Horario'); ?></dt>
		<dd>
			<?php echo h($restaurantesDisponibilidade['RestaurantesDisponibilidade']['disponibilidades_horario']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Restaurantes Disponibilidade'), array('action' => 'edit', $restaurantesDisponibilidade['RestaurantesDisponibilidade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Restaurantes Disponibilidade'), array('action' => 'delete', $restaurantesDisponibilidade['RestaurantesDisponibilidade']['id']), array(), __('Are you sure you want to delete # %s?', $restaurantesDisponibilidade['RestaurantesDisponibilidade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurantes Disponibilidades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurantes Disponibilidade'), array('action' => 'add')); ?> </li>
	</ul>
</div>
