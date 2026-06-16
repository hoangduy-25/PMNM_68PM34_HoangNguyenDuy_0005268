
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title ?? 'Quản lý sinh viên'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
    <?php require_once '../app/views/layout/partial/header.php'; ?>

    <main class="page-content">
        <div class="app-shell">
            <?php require_once '../app/views/' . $viewname . '.php'; ?>
        </div>
    </main>

    <?php require_once '../app/views/layout/partial/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
