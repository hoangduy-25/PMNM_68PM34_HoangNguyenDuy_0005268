<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <title><?php echo $title; ?></title>
    <style>
    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td {
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
    background-color: #04AA6D;
    color: white;
    }
    </style>
</head>
<body>
    <h1><?php echo $title; ?></h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="/home/index/">Trở về Home</a>

    <a class="btn btn-success" href="/sinhvien/create">
        Thêm sinh viên
    </a>
</div>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>MSSV</th>
            <th>Giới tính</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach ($sinhviens as $index => $sinhvien): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo $sinhvien['hoten']; ?></td>
                <td><?php echo $sinhvien['mssv']; ?></td>
                <td><?php echo $sinhvien['gioitinh']; ?></td>
                <td>
                    <a class="btn btn-primary" href="/sinhvien/edit/<?php echo $sinhvien['id']?>">Sửa</a>
                    <a class="btn btn-danger" href="/sinhvien/delete/<?php echo $sinhvien['id']?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div style="margin-top: 20px;">
        <?php
            $pageSize = 5;
            for ($i = 1; $i <= $totalpage; $i++){
                $offset = ($i - 1)*$pageSize;
                echo "<a class='btn btn-secondary me-1' href='/sinhvien/index/$pageSize/$offset'>$i</a>";
            }
        ?>
    </div>

</body>
</html>
