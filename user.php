<?php
session_start();
include './controls/fetchUser.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100" style="background: linear-gradient(to right, #ff9a9e, #fecfef);">
    <?php include './components/header.php'; ?>

    <section id="fecth_user" class="py-5">
        <div class="container">
            <h2 class="mb-4">แสดงข้อมูลผู้ใช้งาน</h2>
            <?php if ($stmt->rowCount() > 0) : ?>
                <div class="container mt-5">
                    <div class="row">
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['first_name'] . " " . htmlspecialchars($row['last_name'])); ?></h5>
                                        <p class="card-text"><strong>อีเมล์:</strong><?php echo htmlspecialchars($row['email']); ?></p>
                                        <p class="card-text"><strong>เบอร์โทร:</strong><?php echo htmlspecialchars($row['phone']); ?></p>
                                        <p class="card-text"><strong>ที่อยู่:</strong><?php echo htmlspecialchars($row['address']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </section>

    <?php include './components/footer.php'; ?>
</body>
</html>