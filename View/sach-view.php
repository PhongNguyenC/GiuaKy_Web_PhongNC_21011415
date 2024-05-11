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
        <?php require_once '../Controller/sach-controller.php';?>
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
