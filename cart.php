<?php

session_start();
include './controls/nongview.php';

//เพิ่มจำนวนสินค้าในตะกร้า
if (isset($_POST['action']) && $_POST['action'] == 'increase' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    foreach ($_SESSION['cart'] as $key => $item) {  // ใช้ $key เพื่อไม่ให้มีการอ้างอิงโดยตรง
        if ($item['productId'] == $productId) {
            $_SESSION['cart'][$key]['quantity'] += 1;
            break;
        }
    }
}
//ลดจำนวนสินค้าในตะกร้า
if (isset($_POST['action']) && $_POST['action'] == 'decrease' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['productId'] == $productId && $item['quantity'] > 1) {
            $_SESSION['cart'][$key]['quantity'] -= 1;
            break;
        }
    }
}
//ลบสินค้าออกจากตะกร้า
if (isset($_POST['action']) && $_POST['action'] == 'remove' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['productId'] == $productId) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}

$totalPrice = 0;
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $item) {
        $totalPrice += $item['productPrice'] * $item['quantity'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100" style="background: linear-gradient(to right, #ff9a9e, #fecfef);">

    <?php include './components/header.php'; ?>

    <section id="cart_product" class="flex-grow-1 py-5">
        <div class="container">
            <h2 class="mb-4">แสดงข้อมูลตะกร้าสินค้า</h2>
            <div class="container mt-5">
                <div class="row">
                    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                        <ul class="list-group">
                            <?php foreach ($_SESSION['cart'] as $item): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex w-100">
                                        <img src="./assets/imgs/<?= htmlspecialchars($item['productImage']); ?>" alt="Product Image" class="img-thumbnail" style="height: 80px; width: 80px; object-fit: cover;">
                                        <div class="ms-3 w-100">
                                            <h5 class="mb-1"><?= htmlspecialchars($item['productName']); ?></h5>
                                            <p class="mb-1"><strong>Price:</strong> <?= htmlspecialchars($item['productPrice']); ?> บาท</p>
                                            <p class="mb-0"><strong>Quantity:</strong> <?= htmlspecialchars($item['quantity']); ?></p>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <form method="post" class="d-inline">
                                            <input type="hidden" name="productId" value="<?= htmlspecialchars($item['productId']); ?>">
                                            <input type="hidden" name="action" value="increase">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-plus-circle-fill"></i> เพิ่ม
                                            </button>
                                        </form>
                                        <form method="post" class="d-inline">
                                            <input type="hidden" name="productId" value="<?= htmlspecialchars($item['productId']); ?>">
                                            <input type="hidden" name="action" value="decrease">
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="bi bi-dash-circle-fill"></i> ลด
                                            </button>
                                        </form>
                                        <form method="post" class="d-inline" onsubmit="return confirmDelete(event);">
                                            <input type="hidden" name="productId" value="<?= htmlspecialchars($item['productId']); ?>">
                                            <input type="hidden" name="action" value="remove">
                                            <button type="submit" class="btn btn-secondary btn-sm">
                                                <i class="bi bi-trash-fill"></i> ลบ
                                            </button>   
                                        </form>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="mt-3 text-right">
                            <h4><strong>ราคาสุทธิ : <?= number_format($totalPrice) ?></strong></h4>
                        </div>
                    <?php else: ?>
                        <p class="text-center col-12">ไม่มีสินค้าในตะกร้า</p>
                    <?php endif; ?>
                    <div class="mt-4 text-right">
                       <div class="mt-4 text-right">
                       <h4><strong>Delivery Address</strong></h4>
                       <hr>
                       <p><strong>Name: </strong><?= htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) ?></p>
                       <p><strong>Address: </strong><?= htmlspecialchars($row['address']); ?></p>
                       <p><strong>Tel: </strong><?= htmlspecialchars($row['phone']); ?></p>
                       <p><strong>Email:</strong> <?= htmlspecialchars($row['email']); ?></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './components/footer.php'; ?>


    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            const form = event.target;
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to remove this item from the cart?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>


</html>