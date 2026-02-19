<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../app/models/ProductModel.php';
require_once __DIR__ . '/../app/models/CartModel.php';

$page   = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? null;

$page = strtolower(trim($page));

switch ($page) {

    case 'home':
        require_once __DIR__ . '/../app/controllers/HomeController.php';
        break;

    case 'catalog':
        require_once __DIR__ . '/../app/controllers/CatalogController.php';
        break;

    case 'cart':
        require_once __DIR__ . '/../app/controllers/CartController.php';
        break;

    case 'checkout':
        require_once __DIR__ . '/../app/controllers/CheckoutController.php';
        break;

    default:
        require_once __DIR__ . '/../app/controllers/HomeController.php';
        break;
}
