<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <h1>Đăng nhập</h1>
    <form action="/auth/login/" method="post" autocomplete="off">
        <div>
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" required><br><br>
        </div>
        <div>
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required><br><br>
        </div>
        <div>
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Ghi nhớ đăng nhập</label><br><br>
        </div>
        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>