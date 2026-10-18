<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('Bootstrap/css/bootstrap.min.css') ?>">
    <title>Користувачі</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
        <ul class="navbar-nav">
            <?php foreach ($users as $user): ?>
                <li class="m-1"><?= anchor($user['id'], $user['name']) ?></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <div class="container">
        <?php foreach ($users as $user): ?>
            <a href="<?= base_url($user['id']) ?>">
                <button class="btn btn-primary" type="button"><?= $user['name'] ?></button>
            </a>
            <br><br>
        <?php endforeach; ?>
    </div>
</body>
</html>