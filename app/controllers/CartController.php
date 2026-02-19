<?php
initCart();

$products = getAllProducts($conn);

$cartItems = [];
$subtotal = 0;
$totalItems = 0;

foreach ($products as $p) {
    $id = (int)$p['product_id'];
    $qty = getCartQty($id);

    if ($qty > 0) {
        $lineTotal = $qty * (float)$p['cost'];

        $cartItems[] = [
            'id' => $id,
            'name' => $p['name'],
            'qty' => $qty,
            'cost' => (float)$p['cost'],
            'line_total' => $lineTotal
        ];

        $subtotal += $lineTotal;
        $totalItems += $qty;
    }
}

$tax = ($subtotal > 0) ? $subtotal * 0.05 : 0;
$shipping = ($subtotal > 0) ? $subtotal * 0.10 : 0;
$orderTotal = $subtotal + $tax + $shipping;

require __DIR__ . '/../views/cart_view.php';
