<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('Bootstrap/css/bootstrap.min.css') ?>">
    <title>Deals</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
    <ul class="navbar-nav">
        <a href="<?= base_url('/') ?>"><img src="<?= base_url('House.png') ?>" alt=""></a>
    </ul>
    </nav>
    <h1>Угоди <b><?= $users['name'] ?></b></h1>
    <h2>Кількість ETH: <?= $users['numberOfCoins'] ?></h2>
    <?php foreach ($deals as $deal): ?>
        ID: <?= $deal['id'] ?>
        <br>Buyer: <?= $deal['buyer'] ?>
        <br>Seller: <?= $deal['seller'] ?>
        <br>Amount: <?= $deal['amount'] ?> ETH
        <br>Status: <?= $deal['status'] ?>
        <br><br>Created at: <?= $deal['createdAt'] ?>
        <br>Updated at: <?= $deal['updatedAt'] ?>
    <?php endforeach; ?>
    <form action="<?= base_url('testUser/'.$users['id']).'/createDeal' ?>" method="post">
        <?= csrf_field() ?>
        <label for="seller">Seller:</label>
        <select name="seller" id="seller">
            <?php foreach ($allUsers as $user): ?>
            <?php if ($user['id'] != $users['id']): ?>
                <option value="<?= esc($user['id']) ?>">
                    <?= esc($user['name']) ?>
                </option>
            <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amound", min="1" required>
        <br><br>
        <button type="submit">Create deal</button>
    </form>
</body>
</html>