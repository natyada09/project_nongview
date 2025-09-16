<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['product_name']);
    $description = trim($_POST['description']);
    $price = $_POST['price'];
    $image = null;

    if (isset($_FILES['products_image']) && $_FILES['products_image']['error'] == 0) {
        $target_dir = "../assets/imgs/";
        $image_name = basename($_FILES["products_image"]["name"]);
        $target_file = $target_dir . $image_name;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES["products_image"]["tmp_name"], $target_file)) {
                $image = $image_name;
            } else {
                $_SESSION['error'] = "Sorry, there was an error uploading your file.";
                header("Location: ../addproduct.php");
                exit;
            }
        } else {
            $_SESSION['error'] = "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.";
            header("Location: ../addproduct.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Please upload an image file.";
        header("Location: ../addproduct.php");
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO cake (products_image, product_name, description, price) VALUES (?, ?, ?, ?)");
    $result = $stmt->execute([$image, $name, $description, $price]);

    if ($result) {
        $_SESSION['success'] = "Product added successfully!";
        header("Location: ../product.php");
    } else {
        $_SESSION['error'] = "Failed to add product.";
        header("Location: ../addproduct.php");
    }
    exit;
}
?>