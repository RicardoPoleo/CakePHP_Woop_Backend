<div class="planes index">
	<h2><?php echo __('Planes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('costo'); ?></th>
			<th><?php echo $this->Paginator->sort('duracion'); ?></th>
			<th><?php echo $this->Paginator->sort('duracion_unidad'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($planes as $plane): ?>
	<tr>
		<td><?php echo h($plane['Plane']['id']); ?>&nbsp;</td>
		<td><?php echo h($plane['Plane']['Nombre']); ?>&nbsp;</td>
		<td><?php echo h($plane['Plane']['costo']); ?>&nbsp;</td>
		<td><?php echo h($plane['Plane']['duracion']); ?>&nbsp;</td>
		<td><?php echo h($plane['Plane']['duracion_unidad']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $plane['Plane']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $plane['Plane']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $plane['Plane']['id']), array(), __('Are you sure you want to delete # %s?', $plane['Plane']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Plane'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
