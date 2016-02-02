<div class="comidas form">
<?php echo $this->Form->create('Comida'); ?>
	<fieldset>
		<legend><?php echo __('Edit Comida'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo');
		echo $this->Form->input('Restaurante');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Comida.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Comida.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Comidas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
