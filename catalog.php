<?php
session_start();
include "db.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 0;
    }

    if ($_GET['action'] == "add") {
        $_SESSION['cart'][$id]++;
    }

    if ($_GET['action'] == "remove") {
        $_SESSION['cart'][$id] = 0;
    }

    if ($_GET['action'] == "set" && isset($_GET['qty'])) {
        $qty = intval($_GET['qty']);
        $_SESSION['cart'][$id] = max(0, $qty);
    }
}

// Get products
$result = $conn->query("SELECT * FROM products");
?>


<style>
    .btn {
        padding: 4px 10px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        margin-right: 4px;
        text-decoration: none;
        display: inline-block;
    }

    .btn-add {
        background-color: #4CAF50; /* soft green */
        color: white;
    }

    .btn-set {
        background-color: #2196F3; /* soft blue */
        color: white;
    }

    .btn-remove {
        background-color: #f44336; /* soft red */
        color: white;
    }

    .qty-input {
        width: 45px;
        padding: 4px;
        text-align: center;
        border-radius: 4px;
        border: 1px solid #ccc;
        margin-right: 4px;
    }
</style>

<h1>Catalog</h1>

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
    $qty = $_SESSION['cart'][$row['product_id']] ?? 0;
?>
<tr>
    <td><?= $row['product_id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['description'] ?></td>
    <td>$<?= number_format($row['cost'], 2) ?></td>
    <td><?= $qty ?></td>
    <td>
        <a href="catalog.php?action=add&id=<?= $row['product_id'] ?>"><button class="btn btn-add">Add</button></a>
    <form action="catalog.php" method="GET" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">
        <input type="number" name="qty" class="qty-input" min="0" value="0">
        <button type="submit" name="action" value="set" class="btn btn-set">Set Qty</button>
    </form>

    <a href="catalog.php?action=remove&id=<?php echo $row['product_id']; ?>">
        <button class="btn btn-remove">Remove</button>
    </a>
    </td>
</tr>
<?php endwhile; ?>
</table>

<br>
<a href="cart.php">Go to Cart</a>
