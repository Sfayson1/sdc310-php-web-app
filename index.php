<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Shopping Cart App</title>
</head>
<body>

<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>


<h1>Welcome</h1>
<p>This is the SDC310 PHP Web Application.</p>
<ul>
  <li><a href="catalog.php">View Catalog</a></li>
  <li><a href="cart.php">View Cart</a></li>
  <li><a href="checkout.php">Checkout (Placeholder)</a></li>
</ul>

<?php include "includes/footer.php"; ?>

</body>
</html>
