<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>
    <main class="page-content">
        <div class="app-shell">
            <div class="soft-card form-card">
                <div class="mb-4">
                    <a class="text-secondary fw-semibold" href="/sinhvien/index/"> <- Quay lại danh sách</a>
                    <h1 class="h3 fw-bold mt-3 mb-1">Thêm sinh viên</h1>
                    <p class="text-secondary mb-0">Nhập thông tin sinh viên mới.</p>
                </div>

                <form action="/sinhvien/store" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="hoten">Họ tên</label>
                        <input class="form-control" type="text" name="hoten" id="hoten" placeholder="Ví dụ: Nguyễn Văn A" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="gioitinh">Giới tính</label>
                        <select class="form-select" name="gioitinh" id="gioitinh" required>
                            <option value="">Chọn giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="mssv">MSSV</label>
                        <input class="form-control" type="text" name="mssv" id="mssv" placeholder="Ví dụ: 0005268" required>
                    </div>

                    <select class="form-select" name="malop" id="malop" required>
                        <option value="">Chọn lớp</option>

                        <?php if (!empty($lops)): ?>
                            <?php foreach ($lops as $lop): ?>
                                <option value="<?php echo htmlspecialchars($lop['malop']); ?>">
                                    <?php echo htmlspecialchars($lop['malop'] . ' - ' . $lop['tenlop']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                    <br>

                    <button class="btn btn-success w-100" type="submit">Thêm sinh viên</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
