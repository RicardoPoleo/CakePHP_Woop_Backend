<div class="restaurantesPosts form">
<?php echo $this->Form->create('RestaurantesPost'); ?>
	<fieldset>
		<legend><?php echo __('Edit Restaurantes Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('restaurantes_rif');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RestaurantesPost.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('RestaurantesPost.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurantes Posts'), array('action' => 'index')); ?></li>
	</ul>
</div>
