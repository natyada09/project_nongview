<?php
session_start();
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the delete statement
    $stmt = $pdo->prepare("DELETE FROM cake WHERE id = ?");
    $result = $stmt->execute([$id]);

    if ($result) {
        $_SESSION['success'] = "Product deleted successfully!";
        header("Location: ../product.php");
    } else {
        $_SESSION['error'] = "Failed to delete product.";
        header("Location: ../product.php");
    }

    exit;
}
?>