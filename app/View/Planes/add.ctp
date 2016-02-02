<div class="planes form">
<?php echo $this->Form->create('Plane'); ?>
	<fieldset>
		<legend><?php echo __('Add Plane'); ?></legend>
	<?php
		echo $this->Form->input('Nombre');
		echo $this->Form->input('costo');
		echo $this->Form->input('duracion');
		echo $this->Form->input('duracion_unidad');
		echo $this->Form->input('Restaurante');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Planes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
