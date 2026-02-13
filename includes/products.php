<?php

function getAllProducts(mysqli $conn): mysqli_result {
    return $conn->query("SELECT * FROM products ORDER BY product_id");
}

function getProductById(mysqli $conn, int $id): ?array {
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
    return $product ?: null;
}
