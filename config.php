<?php
$servername = "localhost";  // Hoặc "127.0.0.1"
$username = "root";         // Tài khoản mặc định trên MAMP
$password = "root";         // MAMP mặc định dùng "root"
$dbname = "v-store";        // Kiểm tra đúng tên database của bạn

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
