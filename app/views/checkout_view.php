<?php require __DIR__ . '/layout/header.php'; ?>
<?php require __DIR__ . '/layout/nav.php'; ?>

<h1>Checkout</h1>

<p><strong><?= htmlspecialchars($message ?? "Thank you!") ?></strong></p>
<p>Your cart has been cleared.</p>
<p>Redirecting you back to the catalog...</p>

<!-- Redirect after 2 seconds -->
<meta http-equiv="refresh" content="2;url=<?= htmlspecialchars($redirectUrl) ?>">

<p>If you are not redirected, <a href="<?= htmlspecialchars($redirectUrl) ?>">click here</a>.</p>

<?php require __DIR__ . '/layout/footer.php'; ?>
