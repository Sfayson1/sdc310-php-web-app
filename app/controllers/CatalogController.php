<?php
initCart();

// basic validation
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($action && $id) {
    // validate product exists (DB-backed validation)
    $product = getProductById($conn, $id);
    if ($product) {
        if ($action === 'add') addToCart($id);
        if ($action === 'remove') removeFromCart($id);
        if ($action === 'increase') increaseQty($id);
        if ($action === 'decrease') decreaseQty($id);
    }
    // redirect to avoid repeat actions on refresh
    header("Location: index.php?page=catalog");
    exit();
}

$products = getAllProducts($conn);

// View gets data only
require __DIR__ . '/../views/catalog_view.php';
