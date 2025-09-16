<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /itweb/index.php");
    exit;
}
include 'controls/idProduct.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/itweb/assets/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="d-flex flex-grow-1">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>แก้ไขสินค้า</h2>
            <form action="controls/editProduct.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $product['id']; ?>">
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['product_name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"><?= htmlspecialchars($product['description']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control" value="<?= htmlspecialchars($product['price']); ?>" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="">Current Image</label><br>
                    <img src="../assets/imgs/<?= htmlspecialchars($product['products_image']); ?>" alt="" style="width:100px;">
                </div>
                <div class="mb-3">
                    <label for="">Change Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                <button type="reset" class="btn btn-danger">รีเซ็ต</button>
                <a href="product.php" class="btn btn-secondary">ย้อนกลับ</a>
            </form>
        </main>
    </div>
</body>

</html>
<?php if (isset($_SESSION['success'])) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ',
            text: '<?= $_SESSION['success']; ?>',
            confirmButtonText: 'ตกลง'
        });
    </script>
<?php unset($_SESSION['success']);
endif; ?>
<?php if (isset($_SESSION['error'])) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'ผิดพลาด',
            text: '<?= $_SESSION['error']; ?>',
            confirmButtonText: 'ตกลง'
        });
    </script>
<?php unset($_SESSION['error']);
endif; ?>