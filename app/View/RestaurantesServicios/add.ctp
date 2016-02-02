<div class="restaurantesServicios form">
<?php echo $this->Form->create('RestaurantesServicio'); ?>
	<fieldset>
		<legend><?php echo __('Add Restaurantes Servicio'); ?></legend>
	<?php
		echo $this->Form->input('restaurantes_rif');
		echo $this->Form->input('servicios_tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Restaurantes Servicios'), array('action' => 'index')); ?></li>
	</ul>
</div>
