<div class="pagos form">
<?php echo $this->Form->create('Pago'); ?>
	<fieldset>
		<legend><?php echo __('Add Pago'); ?></legend>
	<?php
		echo $this->Form->input('restaurante_id');
		echo $this->Form->input('monto');
		echo $this->Form->input('fecha');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pagos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurantes Planes'), array('controller' => 'restaurantes_planes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurantes Plane'), array('controller' => 'restaurantes_planes', 'action' => 'add')); ?> </li>
	</ul>
</div>
