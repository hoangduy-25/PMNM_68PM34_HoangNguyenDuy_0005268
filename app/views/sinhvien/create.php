<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
</head>
<body>
    <h1>Thêm sinh viên</h1>
    <form action="/sinhvien/store" method="post">
        <label for="hoten">Họ tên</label>
        <input type="text" name="hoten" id ="hoten">
        <label for="hoten">Giới tính</label>
        <input type="text" name="gioitinh" id ="gioitinh">
        <label for="hoten">MSSV</label>
        <input type="text" name="mssv" id ="mssv">
        <button type="submit">Thêm</button>
    </form>
</body>
</html>