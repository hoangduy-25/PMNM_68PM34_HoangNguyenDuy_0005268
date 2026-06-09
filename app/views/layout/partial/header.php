<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        .header{
            width: 100%;
            height: 80px;
            background-color: red;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="/sinhvien">Quản lý sinh viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/lophoc">Quản lý lớp học</a>
            </li>
            </ul>
        </div>
    </nav>
</body>
</html>