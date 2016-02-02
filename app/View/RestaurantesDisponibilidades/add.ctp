<div class="restaurantesDisponibilidades form">
<?php echo $this->Form->create('RestaurantesDisponibilidade'); ?>
	<fieldset>
		<legend><?php echo __('Add Restaurantes Disponibilidade'); ?></legend>
	<?php
		echo $this->Form->input('restaurantes_rif');
		echo $this->Form->input('disponibilidades_horario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Restaurantes Disponibilidades'), array('action' => 'index')); ?></li>
	</ul>
</div>
