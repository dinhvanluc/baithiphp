<?php
include 'config.php';

// Lấy danh sách sản phẩm từ database
$sql = "SELECT * FROM item_sale";
$result = $conn->query($sql);

if (!$result) {
    die("Lỗi truy vấn: " . $conn->error);
}

// Xử lý thêm sản phẩm nếu có request POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $expired_date = $_POST['expired_date'];
    $note = $_POST['note'];

    $sql_insert = "INSERT INTO item_sale (item_code, item_name, quantity, expired_date, note) 
                   VALUES ('$item_code', '$item_name', '$quantity', '$expired_date', '$note')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>alert('Thêm sản phẩm thành công!'); window.location.href='list_item.php';</script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center text-warning mt-3">Danh sách sản phẩm</h3>
        <a href="add_item.php" class="btn btn-danger mb-3">Thêm sản phẩm mới</a>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Mã Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Hạn Sử Dụng</th>
                    <th>Ghi Chú</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['item_code'] ?></td>
                            <td><?= $row['item_name'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td><?= date('d/m/Y', strtotime($row['expired_date'])) ?></td>
                            <td><?= $row['note'] ?></td>
                            <td>
                                <a href="edit_item.php?id=<?= $row['id'] ?>" class="text-warning"><i class="fas fa-edit"></i></a>
                                <a href="delete_item.php?id=<?= $row['id'] ?>" class="text-danger" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                <?php }
                } else {
                    echo "<tr><td colspan='7' class='text-center text-danger'>Không có sản phẩm nào!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>