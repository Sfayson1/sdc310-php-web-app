<?php

initCart();

// clear cart when visiting checkout
clearCart();

$message = "Thank you for your order!";

// redirect after 3 seconds
$redirectUrl = "index.php?page=catalog";

require __DIR__ . '/../views/checkout_view.php';
