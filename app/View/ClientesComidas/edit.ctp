<div class="clientesComidas form">
<?php echo $this->Form->create('ClientesComida'); ?>
	<fieldset>
		<legend><?php echo __('Edit Clientes Comida'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cliente_correo');
		echo $this->Form->input('comida');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ClientesComida.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ClientesComida.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes Comidas'), array('action' => 'index')); ?></li>
	</ul>
</div>
