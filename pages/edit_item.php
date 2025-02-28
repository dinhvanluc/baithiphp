<?php
include 'config.php';

// Kiểm tra xem có ID sản phẩm không
if (!isset($_GET['id'])) {
    die("Lỗi: Không tìm thấy ID sản phẩm!");
}

$id = $_GET['id'];

// Lấy thông tin sản phẩm cần chỉnh sửa
$sql = "SELECT * FROM item_sale WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Lỗi: Sản phẩm không tồn tại!");
}

$row = $result->fetch_assoc();

// Xử lý cập nhật sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $expired_date = $_POST['expired_date'];
    $note = $_POST['note'];

    $sql_update = "UPDATE item_sale SET 
        item_code = '$item_code', 
        item_name = '$item_name', 
        quantity = '$quantity', 
        expired_date = '$expired_date', 
        note = '$note' 
        WHERE id = $id";

    if ($conn->query($sql_update) === TRUE) {
        echo "<script>alert('Cập nhật sản phẩm thành công!'); window.location.href='list_item.php';</script>";
    } else {
        echo "Lỗi cập nhật: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chỉnh sửa sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center text-primary mt-3">Chỉnh sửa sản phẩm</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Mã Sản Phẩm</label>
                <input type="text" class="form-control" name="item_code" value="<?= $row['item_code'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên Sản Phẩm</label>
                <input type="text" class="form-control" name="item_name" value="<?= $row['item_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Số Lượng</label>
                <input type="number" class="form-control" name="quantity" value="<?= $row['quantity'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hạn Sử Dụng</label>
                <input type="date" class="form-control" name="expired_date" value="<?= $row['expired_date'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ghi Chú</label>
                <textarea class="form-control" name="note"><?= $row['note'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-success">Lưu thay đổi</button>
            <a href="list_item.php" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>

</html>