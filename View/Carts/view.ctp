<div class="carts view">
<h2><?php echo __('Cart'); ?></h2>
	<table>
		<thead>
			<tr>
				<td><?php echo __('Product'); ?> </td>
				<td><?php echo __('Name'); ?> </td>
				<td><?php echo __('Price'); ?> </td>
				<td><?php echo __('Quantity'); ?></td>
				<td><?php echo __('Subtotal'); ?></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $this->Html->link($cart['Product']['name'], array('controller' => 'products', 'action' => 'view', $cart['Product']['id'])); ?></td>
				<td><?php echo h($cart['Cart']['name']); ?></td>
				<td><?php echo h($cart['Cart']['price']); ?></td>
				<td><?php echo h($cart['Cart']['quantity']); ?></td>
				<td><?php echo h($cart['Cart']['subtotal']); ?></td>
			</tr>
		</tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cart'), array('action' => 'edit', $cart['Cart']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cart'), array('action' => 'delete', $cart['Cart']['id']), null, __('Are you sure you want to delete # %s?', $cart['Cart']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Carts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cart'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
