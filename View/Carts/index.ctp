<div class="carts index">
	<h2><?php echo __('Carts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('sessionid'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('weight_total'); ?></th>
			<th><?php echo $this->Paginator->sort('subtotal'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($carts as $cart): ?>
	<tr>
		<td><?php echo h($cart['Cart']['id']); ?>&nbsp;</td>
		<td><?php echo h($cart['Cart']['sessionid']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cart['Product']['name'], array('controller' => 'products', 'action' => 'view', $cart['Product']['id'])); ?>
		</td>
		<td><?php echo h($cart['Cart']['name']); ?>&nbsp;</td>
		<td><?php echo h($cart['Cart']['weight']); ?>&nbsp;</td>
		<td><?php echo h($cart['Cart']['price']); ?>&nbsp;</td>
		<td><?php echo h($cart['Cart']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($cart['Cart']['weight_total']); ?>&nbsp;</td>
		<td><?php echo h($cart['Cart']['subtotal']); ?>&nbsp;</td>
		<td><?php echo h($cart['Cart']['created']); ?>&nbsp;</td>
		<td><?php echo h($cart['Cart']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cart['Cart']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cart['Cart']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cart['Cart']['id']), null, __('Are you sure you want to delete # %s?', $cart['Cart']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cart'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
