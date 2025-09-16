<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../../assets/imgs/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = $image_name;
            } else {
                $_SESSION['error'] = "Sorry, there was an error uploading your file.";
                header("Location: ../editproduct.php?id=" . $id);
                exit;
            }
        } else {
            $_SESSION['error'] = "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.";
            header("Location: ../editproduct.php?id=" . $id);
            exit;
        }
    }

    $stmt = $pdo->prepare("UPDATE cake SET product_name = ?, description = ?, price = ?" . ($image ? ", products_image = ?" : "") . " WHERE id = ?");
    $params = [$name, $description, $price];
    if ($image) {
        $params[] = $image;
    }
    $params[] = $id;
    $result = $stmt->execute($params);

    if ($result) {
        $_SESSION['success'] = "Product updated successfully!";
        header("Location: ../product.php");
    } else {
        $_SESSION['error'] = "Failed to update product.";
        header("Location: ../editproduct.php?id=" . $id);
    }

    exit;
}
