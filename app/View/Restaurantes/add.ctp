<div class="restaurantes form">
<?php echo $this->Form->create('Restaurante'); ?>
	<fieldset>
		<legend><?php echo __('Add Restaurante'); ?></legend>
	<?php
		echo $this->Form->input('RIF');
		echo $this->Form->input('nombre');
		echo $this->Form->input('correo');
		echo $this->Form->input('clave');
		echo $this->Form->input('estatus');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Restaurantes'), array('action' => 'index')); ?></li>
	</ul>
</div>
