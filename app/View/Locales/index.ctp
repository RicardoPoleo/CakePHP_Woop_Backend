<div class="locales index">
	<h2><?php echo __('Locales'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('restaurantes_rif'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th><?php echo $this->Paginator->sort('ciudad'); ?></th>
			<th><?php echo $this->Paginator->sort('zona'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('coordenada_x'); ?></th>
			<th><?php echo $this->Paginator->sort('coordenada_y'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($locales as $locale): ?>
	<tr>
		<td><?php echo h($locale['Locale']['id']); ?>&nbsp;</td>
		<td><?php echo h($locale['Locale']['restaurantes_rif']); ?>&nbsp;</td>
		<td><?php echo h($locale['Locale']['estado']); ?>&nbsp;</td>
		<td><?php echo h($locale['Locale']['ciudad']); ?>&nbsp;</td>
		<td><?php echo h($locale['Locale']['zona']); ?>&nbsp;</td>
		<td><?php echo h($locale['Locale']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($locale['Locale']['coordenada_x']); ?>&nbsp;</td>
		<td><?php echo h($locale['Locale']['coordenada_y']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $locale['Locale']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $locale['Locale']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $locale['Locale']['id']), array(), __('Are you sure you want to delete # %s?', $locale['Locale']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Locale'), array('action' => 'add')); ?></li>
	</ul>
</div>
