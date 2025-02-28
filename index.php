<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>V_Store - Trang Chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar {
            background-color: #E96A3D;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .container {
            margin-top: 50px;
        }

        .footer {
            background-color: #E96A3D;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- 🔹 Thanh Điều Hướng -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">V_Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/list_item.php">Danh Sách Sản Phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/add_item.php">Thêm Sản Phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/edit_item.php">Chỉnh Sửa Sản Phẩm</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🔹 Nội dung chính -->
    <div class="container text-center">
        <h1 class="mt-5 text-primary">Chào mừng đến với V_Store</h1>
        <p class="lead">Hệ thống quản lý bán hàng đơn giản</p>
        <div class="mt-4">
            <a href="pages/list_item.php" class="btn btn-primary btn-lg">Xem Danh Sách Sản Phẩm</a>
            <a href="pages/add_item.php" class="btn btn-success btn-lg">Thêm Sản Phẩm Mới</a>
        </div>
    </div>

    <!-- 🔹 Footer -->
    <div class="footer">Số 8, Tôn Thất Thuyết, Cầu Giấy, Hà Nội</div>

</body>

</html>