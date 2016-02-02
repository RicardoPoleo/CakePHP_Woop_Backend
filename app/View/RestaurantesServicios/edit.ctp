<div class="restaurantesServicios form">
<?php echo $this->Form->create('RestaurantesServicio'); ?>
	<fieldset>
		<legend><?php echo __('Edit Restaurantes Servicio'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('restaurantes_rif');
		echo $this->Form->input('servicios_tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RestaurantesServicio.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('RestaurantesServicio.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurantes Servicios'), array('action' => 'index')); ?></li>
	</ul>
</div>
