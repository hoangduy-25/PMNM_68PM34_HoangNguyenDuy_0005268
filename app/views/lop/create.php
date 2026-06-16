<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm lớp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>
    <main class="page-content">
        <div class="app-shell">
            <div class="soft-card form-card">
                <div class="mb-4">
                    <a class="text-secondary fw-semibold" href="/lop/index/"> <- Quay lại danh sách</a>
                    <h1 class="h3 fw-bold mt-3 mb-1">Thêm lớp</h1>
                    <p class="text-secondary mb-0">Nhập thông tin lớp mới.</p>
                </div>

                <form action="/lop/store" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="malop">Mã lớp</label>
                        <input class="form-control" type="text" name="malop" id="malop" placeholder="Ví dụ: IT01" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenlop">Tên lớp</label>
                        <input class="form-control" type="text" name="tenlop" id="tenlop" placeholder="Ví dụ: Khoa học Máy tính 01" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="ghichu">Ghi chú</label>
                        <input class="form-control" type="text" name="ghichu" id="ghichu" placeholder="Ví dụ: Lớp khóa 2020" required>
                    </div>

                    <button class="btn btn-success w-100" type="submit">Thêm lớp</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>