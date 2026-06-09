<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sinh Viên</title>
</head>
<body>
    <h1>Edit Sinh Viên</h1>
    <form action="/sinhvien/update/<?php echo $sinhvien['id']; ?>" method="post">
        <label for="hoten">Họ tên</label>
        <input type="text" name="hoten" id ="hoten" value="<?php echo $sinhvien['hoten']; ?>">
        <label for="gioitinh">Giới tính</label>
        <input type="text" name="gioitinh" id ="gioitinh" value="<?php echo $sinhvien['gioitinh']; ?>">
        <label for="mssv">MSSV</label>
        <input type="text" name="mssv" id ="mssv" value="<?php echo $sinhvien['mssv']; ?>">
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>