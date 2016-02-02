<div class="disponibilidades form">
<?php echo $this->Form->create('Disponibilidade'); ?>
	<fieldset>
		<legend><?php echo __('Add Disponibilidade'); ?></legend>
	<?php
		echo $this->Form->input('horario');
		echo $this->Form->input('Restaurante');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Disponibilidades'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
