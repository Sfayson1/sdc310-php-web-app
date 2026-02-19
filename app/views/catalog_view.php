<?php require __DIR__ . '/layout/header.php'; ?>
<?php require __DIR__ . '/layout/nav.php'; ?>

<h1>Catalog</h1>

<table border="1" cellpadding="5">
<tr>
  <th>ID</th><th>Name</th><th>Description</th><th>Cost</th><th>Qty in Cart</th><th>Actions</th>
</tr>

<?php foreach ($products as $row):
  $pid = (int)$row['product_id'];
  $qty = getCartQty($pid);
?>
<tr>
  <td><?= $pid ?></td>
  <td><?= htmlspecialchars($row['name']) ?></td>
  <td><?= htmlspecialchars($row['description']) ?></td>
  <td>$<?= number_format((float)$row['cost'], 2) ?></td>
  <td><?= $qty ?></td>
  <td>
    <a class="btn btn-add" href="index.php?page=catalog&action=add&id=<?= $pid ?>">Add</a>
    <a class="btn btn-remove" href="index.php?page=catalog&action=remove&id=<?= $pid ?>">Remove</a>
    <a class="btn btn-set" href="index.php?page=catalog&action=increase&id=<?= $pid ?>">+</a>
    <a class="btn btn-set" href="index.php?page=catalog&action=decrease&id=<?= $pid ?>">-</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
<a href="/shopping_cart/public/index.php?page=cart">Go to Cart</a>

<?php require __DIR__ . '/layout/footer.php'; ?>
