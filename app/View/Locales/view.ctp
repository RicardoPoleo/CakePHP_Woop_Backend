<div class="locales view">
<h2><?php echo __('Locale'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($locale['Locale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurantes Rif'); ?></dt>
		<dd>
			<?php echo h($locale['Locale']['restaurantes_rif']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($locale['Locale']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo h($locale['Locale']['ciudad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zona'); ?></dt>
		<dd>
			<?php echo h($locale['Locale']['zona']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($locale['Locale']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coordenada X'); ?></dt>
		<dd>
			<?php echo h($locale['Locale']['coordenada_x']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coordenada Y'); ?></dt>
		<dd>
			<?php echo h($locale['Locale']['coordenada_y']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Locale'), array('action' => 'edit', $locale['Locale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Locale'), array('action' => 'delete', $locale['Locale']['id']), array(), __('Are you sure you want to delete # %s?', $locale['Locale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Locale'), array('action' => 'add')); ?> </li>
	</ul>
</div>
