<?php

function initCart(): void {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
}

function getCartQty(int $productId): int {
    return $_SESSION['cart'][$productId] ?? 0;
}

function addToCart(int $productId): void {
    $_SESSION['cart'][$productId] = getCartQty($productId) + 1;
}

function increaseQty(int $productId): void {
    addToCart($productId);
}

function decreaseQty(int $productId): void {
    $newQty = max(0, getCartQty($productId) - 1);
    $_SESSION['cart'][$productId] = $newQty;
}

function removeFromCart(int $productId): void {
    $_SESSION['cart'][$productId] = 0;
}

function clearCart(): void {
    $_SESSION['cart'] = [];
}
