<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <title>Users</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
    <ul class="navbar-nav">
        <a href="<?= base_url('/') ?>"><img src="House.png" alt=""></a>
        <?php foreach ($users as $user): ?>
            <a class="nav-link" href="<?= base_url('testUser/'.esc($user['id'])) ?>"><?= esc($user['name']) ?></a>
        <?php endforeach; ?>
    </ul>
    </nav>
    <?php foreach ($users as $user): ?>
    <div class="d-grid">
        <a href="<?= base_url('testUser/'.esc($user['id'])) ?>"><button type="button" class="btn btn-primary m-3"><?= esc($user['name']) ?></button></a>
    </div>
    <?php endforeach; ?>
</body>
</html>