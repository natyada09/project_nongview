<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>addproduct</title>
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
      border-color: #2f3338ff !important;
      outline: 0;
      box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .25) !important;
    }

    .card {
      max-width: 750px; 
    }
  </style>
</head>

<body style="background: linear-gradient(to right,  #ff9a9e, #fecfef);">
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow rounded-3 w-100">
      <div class="row g-0">
        <div class="col-md-12 py-4 px-3">
          <div class="card-body">
            <!-- สมัครสมาชิก -->
            <h4 class="text-center mb-3">เพิ่มสินค้า</h4>
            <form method="POST" action="controls/addProduct.php" enctype="multipart/form-data">
              <div class="mb-2">
                <label class="form-label">ชื่อเค้ก</label>
                <input type="text" name="product_name" class="form-control form-control-sm">
              </div>
              <div class="mb-2">
                <label class="form-label">คำอธิบาย</label>
                <input type="text" name="description" class="form-control form-control-sm">
              </div>
              <div class="mb-2">
                <label class="form-label">ราคา</label>
                <input type="number" name="price" class="form-control form-control-sm">
              </div>
              <div class="mb-2">
                <label class="form-label">รูปภาพสินค้า</label>
                <input type="file" name="products_image" class="form-control form-control-sm">
              </div>
              <button type="submit" class="btn btn-primary btn-sm w-100">เพิ่มสินค้า</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>