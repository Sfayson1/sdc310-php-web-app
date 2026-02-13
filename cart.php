<?php
session_start();

require_once "config/db.php";
require_once "includes/products.php";
require_once "includes/cart_helpers.php";

initCart();

if (isset($_GET['action']) && $_GET['action'] === "checkout") {
    clearCart();
    header("Location: catalog.php");
    exit();
}

$result = getAllProducts($conn);

$subtotal = 0;
$totalItems = 0;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Shopping Cart</title>
</head>
<body>

<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>


<h1>Shopping Cart</h1>

<table border="1" cellpadding="5">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Quantity</th>
  <th>Cost</th>
  <th>Total</th>
</tr>

<?php while ($row = $result->fetch_assoc()):
  $id = (int)$row['product_id'];
  $qty = getCartQty($id);

  if ($qty > 0):
    $productTotal = $qty * (float)$row['cost'];
    $subtotal += $productTotal;
    $totalItems += $qty;
?>
<tr>
  <td><?= $id ?></td>
  <td><?= htmlspecialchars($row['name']) ?></td>
  <td><?= $qty ?></td>
  <td>$<?= number_format((float)$row['cost'], 2) ?></td>
  <td>$<?= number_format($productTotal, 2) ?></td>
</tr>
<?php endif; endwhile; ?>
</table>

<?php if ($totalItems === 0): ?>
  <p>Your cart is empty.</p>
<?php endif; ?>

<?php
$tax = ($subtotal > 0) ? $subtotal * 0.05 : 0;
$shipping = ($subtotal > 0) ? $subtotal * 0.10 : 0;
$orderTotal = $subtotal + $tax + $shipping;
?>

<p><strong>Total items ordered:</strong> <?= $totalItems ?></p>
<p><strong>Subtotal:</strong> $<?= number_format($subtotal, 2) ?></p>
<p><strong>Tax (5%):</strong> $<?= number_format($tax, 2) ?></p>
<p><strong>Shipping & Handling (10%):</strong> $<?= number_format($shipping, 2) ?></p>
<p><strong>Order Total:</strong> $<?= number_format($orderTotal, 2) ?></p>

<p>
  <a href="catalog.php">Continue Shopping</a>
  <br><br>
  <a href="cart.php?action=checkout">Check Out</a>
</p>

<?php include "includes/footer.php"; ?>


</body>
</html>
