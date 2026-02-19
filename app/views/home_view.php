<?php
require __DIR__ . '/layout/header.php';
require __DIR__ . '/layout/nav.php';
?>

<h1>Welcome</h1>
<p>Welcome to the Shopping Cart App.</p>

<ul>
  <li><a href="index.php?page=catalog">View Catalog</a></li>
  <li><a href="index.php?page=cart">View Cart</a></li>
  <li><a href="index.php?page=checkout">Checkout</a></li>
</ul>

<?php require __DIR__ . '/layout/footer.php'; ?>
