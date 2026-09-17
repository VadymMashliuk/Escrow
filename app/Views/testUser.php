<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('Bootstrap/css/bootstrap.min.css') ?>">
    <title>Escrow</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
    <ul class="navbar-nav">
        <a href="<?= base_url('/') ?>"><img src="<?= base_url('House.png') ?>" alt=""></a>
        <?php foreach ($users as $user): ?>
        <?php endforeach; ?>
    </ul>
    </nav>
</body>
</html>