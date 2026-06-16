<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>
    <main class="page-content">
        <div class="app-shell">
            <div class="soft-card form-card">
                <div class="mb-4">
                    <a class="text-secondary fw-semibold" href="/sinhvien/index/"> <- Quay lại danh sách</a>
                    <h1 class="h3 fw-bold mt-3 mb-1">Sửa sinh viên</h1>
                    <p class="text-secondary mb-0">Cập nhật thông tin sinh viên.</p>
                </div>

                <form action="/sinhvien/update/<?php echo htmlspecialchars($sinhvien['id']); ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="hoten">Họ tên</label>
                        <input class="form-control" type="text" name="hoten" id="hoten" value="<?php echo htmlspecialchars($sinhvien['hoten']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="gioitinh">Giới tính</label>
                        <select class="form-select" name="gioitinh" id="gioitinh" required>
                            <?php $gioitinh = $sinhvien['gioitinh'] ?? ''; ?>
                            <option value="Nam" <?php echo $gioitinh === 'Nam' ? 'selected' : ''; ?>>Nam</option>
                            <option value="Nữ" <?php echo $gioitinh === 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                            <option value="Khác" <?php echo $gioitinh === 'Khác' ? 'selected' : ''; ?>>Khác</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="mssv">MSSV</label>
                        <input class="form-control" type="text" name="mssv" id="mssv" value="<?php echo htmlspecialchars($sinhvien['mssv'] ?? ''); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="malop">Lớp</label>
                        <select class="form-select" name="malop" id="malop" required>
                            <option value="">Chọn lớp</option>

                            <?php if (!empty($lops)): ?>
                                <?php foreach ($lops as $lop): ?>
                                    <?php
                                        $selected = (($sinhvien['malop'] ?? '') === $lop['malop']) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo htmlspecialchars($lop['malop']); ?>" <?php echo $selected; ?>>
                                        <?php echo htmlspecialchars($lop['malop'] . ' - ' . $lop['tenlop']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Cập nhật</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
