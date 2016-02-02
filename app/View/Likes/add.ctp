<div class="likes form">
<?php echo $this->Form->create('Like'); ?>
	<fieldset>
		<legend><?php echo __('Add Like'); ?></legend>
	<?php
		echo $this->Form->input('post_id');
		echo $this->Form->input('restaurante_rif');
		echo $this->Form->input('clientes_correo');
		echo $this->Form->input('creacion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Likes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
