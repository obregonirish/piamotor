<?php
require_once 'config.php'; require_login(); $pageTitle='My bookings';
$st=$pdo->prepare("SELECT b.*,m.name AS motorcycle_name FROM bookings b JOIN motorcycles m ON m.id=b.motorcycle_id WHERE b.user_id=? ORDER BY b.created_at DESC");$st->execute([$_SESSION['user_id']]);$rows=$st->fetchAll();
require 'includes/header.php'; ?>
<section class="page-banner">
    <div class="container"><div class="eyebrow">YOUR ACCOUNT</div>
    <h1>My bookings</h1>
</div>
</section>
<section class="section-pad">
    <div class="container"><?php if(isset($_GET['created'])): ?>
        <div class="alert alert-success">Your booking request was submitted successfully.</div>
        <?php endif; ?><div class="content-card">
            <div class="table-responsive">
            <table class="table align-middle">
                <thead><tr><th>Motorcycle</th>
                <th>Rental dates</th>
                <th>Total</th>
                <th>Status</th>
                <th>Requested</th>
            </tr>
        </thead>
        <tbody><?php foreach($rows as $r): ?><tr>
            <td><?= e($r['motorcycle_name']) ?></td>
            <td><?= e($r['start_date']) ?> to <?= e($r['end_date']) ?></td>
            <td>₱<?= number_format((float)$r['total_amount'],2) ?></td>
            <td>
                <span class="badge text-bg-<?= $r['status']==='approved'?'success':($r['status']==='rejected'?'danger':'warning') ?>"><?= e($r['status']) ?> </span>
            </td>
            <td><?= e($r['created_at']) ?></td>
        </tr><?php endforeach; ?><?php if(!$rows): ?><tr>
            <td colspan="5" class="text-center text-secondary py-4">You have no bookings yet.</td>
        </tr><?php endif; ?>
    </tbody>
</table>
</div>
<a href="motorcycles.php" class="btn btn-yellow">Browse motorcycles</a>
</div>
</div>
</section>
<?php require 'includes/footer.php'; ?>
