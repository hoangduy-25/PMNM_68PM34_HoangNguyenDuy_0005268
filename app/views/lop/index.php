<div class="app-shell student-page">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
        <div>
            <h1 class="h2 fw-bold mb-1">
                <?php echo htmlspecialchars($title ?? 'Danh sách lớp'); ?>
            </h1>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-success" href="/lop/create">Thêm lớp</a>
        </div>
    </div>

    <form class="mb-4" action="/lop/index/5/0" method="get">
        <div class="input-group">
            <input
                class="form-control"
                type="text"
                name="search"
                placeholder="Tìm theo mã lớp, tên lớp hoặc ghi chú..."
                value="<?php echo htmlspecialchars($search ?? ''); ?>"
            >
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            <a class="btn btn-outline-secondary" href="/lop/index/">Làm mới</a>
        </div>
    </form>

    <div class="soft-card table-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã lớp</th>
                        <th>Tên lớp</th>
                        <th>Ghi chú</th>
                        <th class="text-end">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($lops)): ?>
                        <?php foreach ($lops as $index => $lop): ?>
                            <tr>
                                <td>
                                    <span class="student-id">
                                        <?php echo htmlspecialchars($offset + $index + 1); ?>
                                    </span>
                                </td>

                                <td class="fw-semibold">
                                    <?php echo htmlspecialchars($lop['malop'] ?? ''); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($lop['tenlop'] ?? ''); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($lop['ghichu'] ?? ''); ?>
                                </td>

                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">
                                        <a class="btn btn-sm btn-primary"
                                           href="/lop/edit/<?php echo htmlspecialchars($lop['id']); ?>">
                                            Sửa
                                        </a>

                                        <a class="btn btn-sm btn-danger"
                                           href="/lop/delete/<?php echo htmlspecialchars($lop['id']); ?>"
                                           onclick="return confirm('Bạn có chắc muốn xóa lớp này?')">
                                            Xóa
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td class="empty-state" colspan="5">Chưa có lớp nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if (!empty($totalpage) && $totalpage > 1): ?>
        <nav class="mt-4" aria-label="Phân trang lớp">
            <ul class="pagination justify-content-center">
                <?php
                $pageSize = $limit ?? 5;

                for ($i = 1; $i <= $totalpage; $i++):
                    $pageOffset = ($i - 1) * $pageSize;
                    $activeClass = ($i == $currentPage) ? 'active' : '';
                ?>
                    <li class="page-item <?php echo $activeClass; ?>">
                       <a class="page-link" href="/lop/index/<?php echo $pageSize; ?>/<?php echo $pageOffset; ?>?search=<?php echo urlencode($search ?? ''); ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>