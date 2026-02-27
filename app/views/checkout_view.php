<?php require __DIR__ . '/layout/header.php'; ?>
<?php require __DIR__ . '/layout/nav.php'; ?>

<h1>Checkout</h1>

<p><?= $message ?></p>

<p>Redirecting to catalog...</p>

<meta http-equiv="refresh" content="3;url=<?= $redirectUrl ?>">

<?php require __DIR__ . '/layout/footer.php'; ?>
