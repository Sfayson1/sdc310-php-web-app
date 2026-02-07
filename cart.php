<?php
session_start();
include "db.php";

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle checkout (clear cart)
if (isset($_GET['action']) && $_GET['action'] == "checkout") {
    $_SESSION['cart'] = [];
    header("Location: catalog.php");
    exit();
}

// Get products
$result = $conn->query("SELECT * FROM products");

$subtotal = 0;
$totalItems = 0;
?>

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
    $id = $row['product_id'];
    $qty = $_SESSION['cart'][$id] ?? 0;

    if ($qty > 0):
        $productTotal = $qty * $row['cost'];
        $subtotal += $productTotal;
        $totalItems += $qty;
?>
<tr>
    <td><?= $id ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $qty ?></td>
    <td>$<?= number_format($row['cost'], 2) ?></td>
    <td>$<?= number_format($productTotal, 2) ?></td>
</tr>
<?php endif; endwhile; ?>
</table>

<br>

<?php
$tax = $subtotal * 0.05;
$shipping = $subtotal * 0.10;
$orderTotal = $subtotal + $tax + $shipping;
?>

<p><strong>Total items ordered:</strong> <?= $totalItems ?></p>
<p><strong>Subtotal:</strong> $<?= number_format($subtotal, 2) ?></p>
<p><strong>Tax (5%):</strong> $<?= number_format($tax, 2) ?></p>
<p><strong>Shipping & Handling (10%):</strong> $<?= number_format($shipping, 2) ?></p>
<p><strong>Order Total:</strong> $<?= number_format($orderTotal, 2) ?></p>

<br>

<a href="catalog.php">Continue Shopping</a>
<br><br>
<a href="cart.php?action=checkout">Check Out</a>
