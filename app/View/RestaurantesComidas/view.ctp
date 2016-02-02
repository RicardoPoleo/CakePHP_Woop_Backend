<div class="restaurantesComidas view">
<h2><?php echo __('Restaurantes Comida'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($restaurantesComida['RestaurantesComida']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurantes Rif'); ?></dt>
		<dd>
			<?php echo h($restaurantesComida['RestaurantesComida']['restaurantes_rif']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comidas Tipo'); ?></dt>
		<dd>
			<?php echo h($restaurantesComida['RestaurantesComida']['comidas_tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Restaurantes Comida'), array('action' => 'edit', $restaurantesComida['RestaurantesComida']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Restaurantes Comida'), array('action' => 'delete', $restaurantesComida['RestaurantesComida']['id']), array(), __('Are you sure you want to delete # %s?', $restaurantesComida['RestaurantesComida']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurantes Comidas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurantes Comida'), array('action' => 'add')); ?> </li>
	</ul>
</div>
