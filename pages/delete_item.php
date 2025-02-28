<?php
include '../config.php';

// Kiểm tra nếu có ID sản phẩm cần xóa
if (!isset($_GET['id'])) {
    die("Lỗi: Không tìm thấy ID sản phẩm!");
}

$id = $_GET['id'];

// Thực hiện truy vấn xóa
$sql_delete = "DELETE FROM item_sale WHERE id = $id";

if ($conn->query($sql_delete) === TRUE) {
    echo "<script>alert('Xóa sản phẩm thành công!'); window.location.href='list_item.php';</script>";
} else {
    echo "Lỗi khi xóa: " . $conn->error;
}
