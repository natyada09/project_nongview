<?php
session_start();
include './controls/fetchProduct.php'; // สมมติไฟล์นี้ fetch ข้อมูลจาก DB
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้าของเรา | Sweet Delight</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include './components/header.php'; ?>

    <section id="fetch_product" class="py-5" style="background: linear-gradient(to right, #ff9a9e, #fecfef);">
        <div class="container">
            <h2 class="text-center mb-4" style="color:#d63384;">เค้กแนะนำของเรา</h2>
            <?php if ($stmt->rowCount() > 0) : ?>
                <div class="row g-4">
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-3">
                            <div class="card h-100 shadow-sm">
                                <img src="./assets/imgs/<?= htmlspecialchars($row['products_image']); ?>" 
                                     class="card-img-top" 
                                     alt="<?= htmlspecialchars($row['product_name']); ?>" 
                                     style="object-fit:cover; height:200px;">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= htmlspecialchars($row['product_name']); ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($row['description']); ?></p>
                                    <p class="fw-bold text-danger"><?= htmlspecialchars($row['price']); ?> บาท</p>
                                    <button class="btn btn-pink"
                                        id="add-to-cart"
                                        data-id="<?= htmlspecialchars($row['id']); ?>"
                                        data-name="<?= htmlspecialchars($row['product_name']); ?>"
                                        data-price="<?= htmlspecialchars($row['price']); ?>"
                                        data-image="<?= htmlspecialchars($row['products_image']); ?>">
                                        เพิ่มสินค้า
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php else: ?>
                <p class="text-center">ยังไม่มีสินค้าในหมวดเค้ก</p>
            <?php endif ?>
        </div>
    </section>

    <?php include './components/footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('#add-to-cart');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    const productName = this.getAttribute('data-name');
                    const productPrice = this.getAttribute('data-price');
                    const productImage = this.getAttribute('data-image');

                    fetch('./controls/addToCart.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: new URLSearchParams({
                            productId: productId,
                            productName: productName,
                            productPrice: productPrice,
                            productImage: productImage
                        })
                    })
                    .then(response => response.text())
                    .then(data => {
                        Swal.fire({
                            title: 'สำเร็จ',
                            text: `${productName} ได้ถูกเพิ่มลงในตะกร้าแล้ว!`,
                            icon: 'success',
                            confirmButtonText: 'ตกลง'
                        });
                    }).catch(error => {
                        Swal.fire({
                            title: 'เกิดข้อผิดพลาด',
                            text: `${error.message} ไม่สามารถเพิ่มสินค้าได้ กรุณาลองใหม่อีกครั้ง`,
                            icon: 'error',
                            confirmButtonText: 'ตกลง'
                        });
                    });
                });
            });
        });
    </script>

    <style>
        .btn-pink {
            background-color: #ff6f91;
            color: white;
        }
        .btn-pink:hover {
            background-color: #ff3f61;
            color: white;
        }
    </style>
</body>
</html>