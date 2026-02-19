<?php

function initCart(): void {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
}

function getCartQty(int $productId): int {
    return (int)($_SESSION['cart'][$productId] ?? 0);
}

function addToCart(int $productId): void {
    initCart();
    $_SESSION['cart'][$productId] = getCartQty($productId) + 1;
}

function removeFromCart(int $productId): void {
    initCart();
    $_SESSION['cart'][$productId] = 0;
}

function increaseQty(int $productId): void {
    addToCart($productId);
}

function decreaseQty(int $productId): void {
    initCart();
    $newQty = getCartQty($productId) - 1;
    $_SESSION['cart'][$productId] = max(0, $newQty);
}

function cartItemCount(): int {
    initCart();
    return array_sum($_SESSION['cart']);
}

function clearCart(): void {
    initCart();
    $_SESSION['cart'] = [];
}
