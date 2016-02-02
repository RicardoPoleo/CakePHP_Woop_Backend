<div class="restaurantesPosts index">
	<h2><?php echo __('Restaurantes Posts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('restaurantes_rif'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($restaurantesPosts as $restaurantesPost): ?>
	<tr>
		<td><?php echo h($restaurantesPost['RestaurantesPost']['id']); ?>&nbsp;</td>
		<td><?php echo h($restaurantesPost['RestaurantesPost']['restaurantes_rif']); ?>&nbsp;</td>
		<td><?php echo h($restaurantesPost['RestaurantesPost']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $restaurantesPost['RestaurantesPost']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $restaurantesPost['RestaurantesPost']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $restaurantesPost['RestaurantesPost']['id']), array(), __('Are you sure you want to delete # %s?', $restaurantesPost['RestaurantesPost']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Restaurantes Post'), array('action' => 'add')); ?></li>
	</ul>
</div>
