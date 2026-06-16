<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa lớp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>
    <main class="page-content">
        <div class="app-shell">
            <div class="soft-card form-card">
                <div class="mb-4">
                    <a class="text-secondary fw-semibold" href="/lop/index/"> <- Quay lại danh sách</a>
                    <h1 class="h3 fw-bold mt-3 mb-1">Sửa lớp</h1>
                    <p class="text-secondary mb-0">Cập nhật thông tin lớp.</p>
                </div>

                <form action="/lop/update/<?php echo htmlspecialchars($lop['id']); ?>" method="post">

                    <input type="hidden" name="malop" value="<?php echo htmlspecialchars($lop['malop'] ?? ''); ?>">
                    <div class="mb-3">
                        <label class="form-label">Mã lớp</label>
                        <input class="form-control" type="text"
                            value="<?php echo htmlspecialchars($lop['malop'] ?? ''); ?>"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tenlop">Tên lớp</label>
                        <input class="form-control" type="text" name="tenlop" id="tenlop" value="<?php echo htmlspecialchars($lop['tenlop']); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="ghichu">Ghi chú</label>
                        <input class="form-control" type="text" name="ghichu" id="ghichu" value="<?php echo htmlspecialchars($lop['ghichu']); ?>">
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Cập nhật</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>