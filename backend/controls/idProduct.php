<?php
    include 'db.php';

    // ดึงข้อมูลผู้ใช้งานตาม id
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM cake WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
?>