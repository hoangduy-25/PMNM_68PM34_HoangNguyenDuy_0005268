<div class="app-shell student-page">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
        <div>
            <h1 class="h2 fw-bold mb-1"><?php echo htmlspecialchars($title ?? 'Danh sách sinh viên'); ?></h1>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-success" href="/sinhvien/create">Thêm sinh viên</a>
        </div>
    </div>

    <form class="mb-4" action="/sinhvien/index/5/0" method="get">
        <div class="input-group">
            <input class="form-control" type="text" name="search"
                placeholder="Tìm theo họ tên, MSSV, mã lớp hoặc tên lớp..."
                value="<?php echo htmlspecialchars($search ?? ''); ?>">

            <select class="form-select" name="sort" style="max-width: 170px;">
                <option value="id" <?php echo ($sort ?? '') === 'id' ? 'selected' : ''; ?>>Sắp xếp mặc định</option>
                <option value="mssv" <?php echo ($sort ?? '') === 'mssv' ? 'selected' : ''; ?>>Theo MSSV</option>
                <option value="hoten" <?php echo ($sort ?? '') === 'hoten' ? 'selected' : ''; ?>>Theo họ tên</option>
            </select>

            <select class="form-select" name="dir" style="max-width: 120px;">
                <option value="ASC" <?php echo ($dir ?? '') === 'ASC' ? 'selected' : ''; ?>>Tăng dần</option>
                <option value="DESC" <?php echo ($dir ?? '') === 'DESC' ? 'selected' : ''; ?>>Giảm dần</option>
            </select>

            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            <a class="btn btn-outline-secondary" href="/sinhvien/index/">Làm mới</a>
        </div>
    </form>

    <div class="soft-card table-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>MSSV</th>
                        <th>Giới tính</th>
                        <th>Tên lớp</th>
                        <th class="text-end">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($sinhviens)): ?>
                        <?php foreach ($sinhviens as $index => $sinhvien): ?>
                            <tr>
                                <td>
                                    <span class="student-id">
                                        <?php echo htmlspecialchars($offset + $index + 1); ?>
                                    </span>
                                </td>
                                <td class="fw-semibold"><?php echo htmlspecialchars($sinhvien['hoten']); ?></td>
                                <td><?php echo htmlspecialchars($sinhvien['mssv']); ?></td>
                                <td><?php echo htmlspecialchars($sinhvien['gioitinh']); ?></td>
                                <td><?php echo htmlspecialchars($sinhvien['tenlop'] ?? 'Chưa có lớp'); ?></td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">
                                        <a class="btn btn-sm btn-primary" href="/sinhvien/edit/<?php echo htmlspecialchars($sinhvien['id']); ?>">Sửa</a>
                                        <a class="btn btn-sm btn-danger" href="/sinhvien/delete/<?php echo htmlspecialchars($sinhvien['id']); ?>" onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">Xóa</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td class="empty-state" colspan="6">Chưa có sinh viên nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php if (!empty($totalpage) && $totalpage > 1): ?>
    <nav class="mt-4" aria-label="Phân trang sinh viên">
        <ul class="pagination justify-content-center">
            <?php
            $pageSize = $limit ?? 5;

            for ($i = 1; $i <= $totalpage; $i++):
                $pageOffset = ($i - 1) * $pageSize;
                $activeClass = ($i == $currentPage) ? 'active' : '';
            ?>
                <li class="page-item <?php echo $activeClass; ?>">
                    <a class="page-link" href="/sinhvien/index/<?php echo $pageSize; ?>/<?php echo $pageOffset; ?>?search=<?php echo urlencode($search ?? ''); ?>&sort=<?php echo urlencode($sort ?? 'id'); ?>&dir=<?php echo urlencode($dir ?? 'ASC'); ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>
</div>