<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

// ตัวอย่างสินค้าเค้ก
$cakes = [
    ["name" => "Chocolate Cake", "price" => 450, "image" => "./assets/imgs/chocolate.png", "desc" => "เค้กช็อกโกแลตเข้มข้น เนื้อนุ่ม"],
    ["name" => "Strawberry Cheesecake", "price" => 520, "image" => "./assets/imgs/Strawberry Cheesecake.png", "desc" => "ชีสเค้กเนื้อนุ่ม ราดซอสสตรอเบอร์รีสด"],
    ["name" => "Red Velvet", "price" => 490, "image" => "./assets/imgs/Red Velvet.png", "desc" => "เรดเวลเวทสีแดงสด รสชาติกลมกล่อม"],
    ["name" => "Vanilla Cake", "price" => 420, "image" => "./assets/imgs/Vanilla Cake.png", "desc" => "เค้กวนิลาหอมหวาน เนื้อนุ่มละมุน"]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แนะนำเค้ก | Sweet Delight</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include './components/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero text-white text-center py-5" style="background: linear-gradient(to right, #ff9a9e, #fecfef); height: 100vh;">
        <div class="container h-100 d-flex flex-column justify-content-center">
            <h1 class="display-4">ขอต้อนรับสู่ Sweet Delight</h1>
            <p class="lead">พบกับเค้กสดใหม่ หวานละมุน และเมนูสุดพิเศษที่คุณไม่ควรพลาด</p>
            <a href="#content" class="btn btn-light btn-lg mx-auto">ชมเมนูเค้ก</a>
        </div>
    </section>

    <!-- Content Section -->
    <section id="content" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">เมนูเค้กแนะนำ</h2>
            <div class="row g-4">
                <?php foreach($cakes as $cake): ?>
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="<?php echo $cake['image']; ?>" class="card-img-top" alt="<?php echo $cake['name']; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $cake['name']; ?></h5>
                            <p class="card-text"><?php echo $cake['desc']; ?></p>
                            <p class="fw-bold"><?php echo number_format($cake['price']); ?> บาท</p>
                            <a href="#" class="btn btn-pink">สั่งซื้อ</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include './components/footer.php'; ?>

    <script>
        <?php if (isset($_GET['success']) && $_GET['success'] == 'true') : ?>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ!',
                text: 'เข้าสู่ระบบเรียบร้อยแล้ว',
            });
        <?php endif; ?>
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
