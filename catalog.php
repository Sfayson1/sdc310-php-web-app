<?php
session_start();

require_once "config/db.php";
require_once "includes/products.php";
require_once "includes/cart_helpers.php";

initCart();

// Validate action + id safely
$allowedActions = ["add", "remove", "increase", "decrease"];
$action = $_GET['action'] ?? null;
$idRaw = $_GET['id'] ?? null;

$message = "";

if ($action !== null || $idRaw !== null) {
    if (!in_array($action, $allowedActions, true)) {
        $message = "Invalid action requested.";
    } elseif (!ctype_digit($idRaw)) {
        $message = "Invalid product ID.";
    } else {
        $id = (int)$idRaw;

        // Make sure product exists
        $product = getProductById($conn, $id);
        if (!$product) {
            $message = "Product not found.";
        } else {
            // Perform action
            if ($action === "add") addToCart($id);
            if ($action === "remove") removeFromCart($id);
            if ($action === "increase") increaseQty($id);
            if ($action === "decrease") decreaseQty($id);
        }
    }
}

$result = getAllProducts($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Catalog</title>
</head>
<body>

<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>


<h1>Catalog</h1>

<?php if ($message): ?>
  <p><strong><?= htmlspecialchars($message) ?></strong></p>
<?php endif; ?>

<table border="1" cellpadding="5">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Description</th>
  <th>Cost</th>
  <th>Quantity in Cart</th>
  <th>Actions</th>
</tr>

<?php while ($row = $result->fetch_assoc()):
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
<a class="btn btn-add" href="catalog.php?action=add&id=<?= $pid ?>">Add</a> |
<a class="btn btn-remove" href="catalog.php?action=remove&id=<?= $pid ?>">Remove</a> |
<a class="btn btn-set" href="catalog.php?action=increase&id=<?= $pid ?>">+</a>
<a class="btn btn-set" href="catalog.php?action=decrease&id=<?= $pid ?>">-</a>

  </td>
</tr>
<?php endwhile; ?>
</table>

<p><a href="cart.php">Go to Cart</a></p>

<?php include "includes/footer.php"; ?>

</body>
</html>
