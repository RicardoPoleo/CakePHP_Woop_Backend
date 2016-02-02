<div class="restaurantes view">
<h2><?php echo __('Restaurante'); ?></h2>
	<dl>
		<dt><?php echo __('RIF'); ?></dt>
		<dd>
			<?php echo h($restaurante['Restaurante']['RIF']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($restaurante['Restaurante']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correo'); ?></dt>
		<dd>
			<?php echo h($restaurante['Restaurante']['correo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clave'); ?></dt>
		<dd>
			<?php echo h($restaurante['Restaurante']['clave']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estatus'); ?></dt>
		<dd>
			<?php echo h($restaurante['Restaurante']['estatus']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Restaurante'), array('action' => 'edit', $restaurante['Restaurante']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Restaurante'), array('action' => 'delete', $restaurante['Restaurante']['id']), array(), __('Are you sure you want to delete # %s?', $restaurante['Restaurante']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurantes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurante'), array('action' => 'add')); ?> </li>
	</ul>
</div>
