<div class="clientes index">
	<h2><?php echo __('Feed de Posts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo "ID"; ?></th>
			<th><?php echo "Autor"; ?></th>
			<th><?php echo "Foto del Autor"; ?></th>
			<th><?php echo "Imagen"; ?></th>
			<th><?php echo "Cantidad Likes"; ?></th>
			<th><?php echo "Cantidad Comentarios"; ?></th>
			<th><?php echo "Descripcion"; ?></th>
			<th><?php echo "Fecha"; ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo h($post['id']); ?>&nbsp;</td>
		<td><?php echo h($post['datosPerfil']['correo']); ?>&nbsp;</td>
		<td><?php echo "<img src=".$post['datosPerfil']['image']." style='width: 30%;'>"; ?>&nbsp;</td>
		<td><?php echo "<img src=".$post['imagen_url']." style='width: 30%;'>"; ?>&nbsp;</td>
		<td><?php echo h($post['numberLikes']); ?>&nbsp;</td>
		<td><?php echo h($post['numberComments']); ?>&nbsp;</td>
		<td><?php echo h($post['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($post['creacion']); ?>&nbsp;</td>
		<td class="actions">
			<?php 
				if($post['liked'])
				{
					echo $this->Html->link(__('Liked!'), array('action' => '#')); 
				}
				else
				{
					echo $this->Html->link(__('Like'), array('action' => '#')); 
				}
			?>
			<?php echo $this->Html->link(__('Comment'), array('action' => 'edit', 1)); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<!--div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div-->
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'post_add')); ?></li>
		<li><?php echo $this->Html->link(__('Search Profiles'), array('action' => 'index')); ?></li>
	</ul>
</div>
