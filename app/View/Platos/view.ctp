<div class="platos view">
<h2><?php echo __('Plato'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($plato['Plato']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurantes Rif'); ?></dt>
		<dd>
			<?php echo h($plato['Plato']['restaurantes_rif']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($plato['Plato']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($plato['Plato']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Plato'), array('action' => 'edit', $plato['Plato']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Plato'), array('action' => 'delete', $plato['Plato']['id']), array(), __('Are you sure you want to delete # %s?', $plato['Plato']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Platos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plato'), array('action' => 'add')); ?> </li>
	</ul>
</div>
