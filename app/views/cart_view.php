<?php require __DIR__ . '/layout/header.php'; ?>
<?php require __DIR__ . '/layout/nav.php'; ?>

<h1>Shopping Cart</h1>

<?php if (empty($cartItems)): ?>
    <p>Your cart is empty.</p>
<?php else: ?>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Quantity</th>
    <th>Cost</th>
    <th>Total</th>
</tr>

<?php foreach ($cartItems as $item): ?>
<tr>
    <td><?= $item['id'] ?></td>
    <td><?= htmlspecialchars($item['name']) ?></td>
    <td><?= $item['qty'] ?></td>
    <td>$<?= number_format($item['cost'], 2) ?></td>
    <td>$<?= number_format($item['line_total'], 2) ?></td>
</tr>
<?php endforeach; ?>

</table>

<?php endif; ?>

<p><strong>Total items ordered:</strong> <?= (int)$totalItems ?></p>
<p><strong>Subtotal:</strong> $<?= number_format((float)$subtotal, 2) ?></p>
<p><strong>Tax (5%):</strong> $<?= number_format((float)$tax, 2) ?></p>
<p><strong>Shipping &amp; Handling (10%):</strong> $<?= number_format((float)$shipping, 2) ?></p>
<p><strong>Order Total:</strong> $<?= number_format((float)$orderTotal, 2) ?></p>

<div>
    <a href="index.php?page=catalog">Continue Shopping</a>

    <?php if ($totalItems > 0): ?>
        &nbsp;|&nbsp;
        <a href="index.php?page=cart&action=empty">Empty Cart</a>
        &nbsp;|&nbsp;
        <a href="index.php?page=checkout">Check Out</a>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/layout/footer.php'; ?>
