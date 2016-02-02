<div class="restaurantesPosts view">
<h2><?php echo __('Restaurantes Post'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($restaurantesPost['RestaurantesPost']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurantes Rif'); ?></dt>
		<dd>
			<?php echo h($restaurantesPost['RestaurantesPost']['restaurantes_rif']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($restaurantesPost['RestaurantesPost']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Restaurantes Post'), array('action' => 'edit', $restaurantesPost['RestaurantesPost']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Restaurantes Post'), array('action' => 'delete', $restaurantesPost['RestaurantesPost']['id']), array(), __('Are you sure you want to delete # %s?', $restaurantesPost['RestaurantesPost']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurantes Posts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurantes Post'), array('action' => 'add')); ?> </li>
	</ul>
</div>
