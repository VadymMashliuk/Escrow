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
        ID: <?= $deal['id'] ?>.
        Buyer: <?= $deal['buyer'] ?>.
        Seller: <?= $deal['seller'] ?>.
        Amount: <?= $deal['amount'] ?> ETH.
        Status: <?= $deal['status'] ?>.
        <br>Created at: <?= $deal['createdAt'] ?>.
        Updated at: <?= $deal['updatedAt'] ?>.
        <form method="post" action="/deal/<?= $deal['id'] ?>/fund">
            <button class="btn btn-warning m-3" type="submit">Fund</button>
        </form>
        <form method="post" action="/deal/<?= $deal['id'] ?>/confirm">
            <button class="btn btn-success m-3" type="submit">Confirm delivery</button>
        </form>
        <form method="post" action="/deal/<?= $deal['id'] ?>/refund">
            <button class="btn btn-danger m-3" type="submit">Refund</button>
        </form>
    <?php endforeach; ?>
    <br><br>
    <form action="<?= base_url('testUser/'.$users['id'].'/create') ?>" method="post">
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
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" min="1" required>
        <button class="btn btn-primary m-3" type="submit">Create deal</button>
    </form>
</body>
</html>