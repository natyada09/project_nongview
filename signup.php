<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUp</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="./assets/css/style.css">

  <style>
    
    .form-control {
      border: 1px solid #ced4da !important;
      border-radius: 4px !important;
      box-shadow: none !important;
    }

    .form-control:focus {
      border-color: #86b7fe !important;
      outline: 0;
      box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .25) !important;
    }

    .card {
      max-width: 750px; 
    }
  </style>
</head>

<body style="background: linear-gradient(to right, #f0a4a6ff, #fecfef);">
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow rounded-3 w-100">
      <div class="row g-0">
        <!-- ฟอร์มด้านซ้าย -->
        <div class="col-md-6 py-4 px-3">
          <div class="card-body">
            <!-- สมัครสมาชิก -->
            <h4 class="text-center mb-3">สมัครสมาชิก</h4>
            <form method="POST" action="controls/createUsers.php">
              <div class="mb-2">
                <label class="form-label">ชื่อจริง</label>
                <input type="text" name="first_name" class="form-control form-control-sm">
              </div>
              <div class="mb-2">
                <label class="form-label">นามสกุล</label>
                <input type="text" name="last_name" class="form-control form-control-sm">
              </div>
              <div class="mb-2">
                <label class="form-label">ที่อยู่ปัจจุบัน</label>
                <textarea name="address" class="form-control form-control-sm" rows="2"></textarea>
              </div>
              <div class="mb-2">
                <label class="form-label">เบอร์โทรศัพท์</label>
                <input type="text" name="phone" class="form-control form-control-sm">
              </div>
              <div class="mb-2">
                <label class="form-label">อีเมล์เข้าใช้งาน</label>
                <input type="email" name="email" class="form-control form-control-sm">
              </div>
              <div class="mb-3">
                <label class="form-label">รหัสผ่าน</label>
                <input type="password" name="password" class="form-control form-control-sm">
              </div>
              <button type="submit" class="btn btn-primary btn-sm w-100">สมัครสมาชิก</button>
            </form>
            <!-- เข้าสู่ระบบ -->
            <div class="text-center mt-2">
              <small>หากคุณมีบัญชีเข้าใช้งานแล้ว? <a href="signin.php">เข้าสู่ระบบ</a></small>
            </div>
          </div>
        </div>

        <!-- ฟอร์มด้านขวา -->
        <div class="col-md-6 d-none d-md-block">
          <img src="assets/imgs/nong.png" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
        </div>
      </div>
    </div>
  </div>
</body>

</html>
