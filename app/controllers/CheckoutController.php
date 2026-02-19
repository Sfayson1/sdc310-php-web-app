<?php
require_once __DIR__ . '/../models/CartModel.php';

initCart();
clearCart();

$message = "Thank you for your order!";

$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$redirectUrl = $base . "/index.php?page=catalog";

require __DIR__ . '/../views/checkout_view.php';
