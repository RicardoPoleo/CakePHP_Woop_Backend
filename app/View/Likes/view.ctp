<div class="likes view">
<h2><?php echo __('Like'); ?></h2>
	<dl>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($like['Post'][''], array('controller' => 'posts', 'action' => 'view', $like['Post']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurante Rif'); ?></dt>
		<dd>
			<?php echo h($like['Like']['restaurante_rif']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clientes Correo'); ?></dt>
		<dd>
			<?php echo h($like['Like']['clientes_correo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creacion'); ?></dt>
		<dd>
			<?php echo h($like['Like']['creacion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Like'), array('action' => 'edit', $like['Like']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Like'), array('action' => 'delete', $like['Like']['id']), array(), __('Are you sure you want to delete # %s?', $like['Like']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Likes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Like'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
