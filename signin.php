<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body style="background: linear-gradient(to right, #ff9a9e, #fecfef);">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
        <div class="card">
            <div class="row g-0 shadow">
                <!-- ฟอร์มด้านซ้าย -->
                <div class=" py-5 px-3">
                    <div class="card-body">
                        <!-- เข้าสู่ระบบ -->
                        <h2 class="text-center">เข้าสู่ระบบ</h2>
                        <form method="POST" action="./controls/signinUsers.php">
                            <div class="mb-3">
                                <label for="" class="form-label">อีเมล์</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">รหัสผ่าน</label>
                                <input type="password" name="pass" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">เข้าสู่ระบบ</button>
                        </form>
                        <!-- สมัครสมาชิก -->
                        <div class="text-center mt-3">
                            <span>หากคุณยังไม่มีบัญชีเข้าใช้งาน?</span>
                            <a href="signup.php">สมัครสมาชิก</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid') : ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid email or password',
                footer: 'Please try again.'
            });
        <?php endif; ?>
    </script>
</body>

</html>