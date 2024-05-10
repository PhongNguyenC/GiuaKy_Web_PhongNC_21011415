<?php
// Bắt đầu phiên làm việc
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION["username"])) {
    // Nếu chưa, chuyển hướng người dùng đến trang đăng nhập
    header("Location: login.php");
    exit();
}

// Kết nối đến cơ sở dữ liệu
$uri = "mysql://avnadmin:AVNS_lWzfdjNsHeVuH_YC5e8@mysql-492a8c7-st-df0a.l.aivencloud.com:13687/defaultdb?ssl-mode=REQUIRED";
$fields = parse_url($uri);
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];
$conn .= ";dbname=defaultdb";
$conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";

try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);
    
    // Truy vấn dữ liệu sách từ cơ sở dữ liệu (chỉ lấy 5 bản ghi đầu tiên)
    $stmt = $db->query("SELECT * FROM Sach LIMIT 5");
    $sachList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sách</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Danh sách sách</h2>
    <table>
        <thead>
            <tr>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sachList as $sach): ?>
                <tr>
                    <td><?php echo $sach['MaSach']; ?></td>
                    <td><?php echo $sach['TenSach']; ?></td>
                    <td><?php echo $sach['SoLuong']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

