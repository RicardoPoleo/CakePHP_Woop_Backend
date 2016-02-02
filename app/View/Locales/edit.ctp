<div class="locales form">
<?php echo $this->Form->create('Locale'); ?>
	<fieldset>
		<legend><?php echo __('Edit Locale'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('restaurantes_rif');
		echo $this->Form->input('estado');
		echo $this->Form->input('ciudad');
		echo $this->Form->input('zona');
		echo $this->Form->input('direccion');
		echo $this->Form->input('coordenada_x');
		echo $this->Form->input('coordenada_y');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Locale.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Locale.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Locales'), array('action' => 'index')); ?></li>
	</ul>
</div>
