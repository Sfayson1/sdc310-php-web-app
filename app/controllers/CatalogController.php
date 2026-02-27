<?php
initCart();

$action = $_GET['action'] ?? null;
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($action && $id > 0) {
    $product = getProductById($conn, $id);
    if ($product) {
        switch ($action) {
            case 'add':
            case 'increase':
                addToCart($id);
                break;

            case 'decrease':
                decreaseQty($id);
                break;

            case 'remove':
                removeFromCart($id);
                break;
        }
    }
}

$products = getAllProducts($conn);

require __DIR__ . '/../views/catalog_view.php';
