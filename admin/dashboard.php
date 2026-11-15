<?php
require_once '../config.php'; require_admin(); $pageTitle='Admin dashboard';
$counts=['motorcycles'=>$pdo->query("SELECT COUNT(*) FROM motorcycles")->fetchColumn(),'bookings'=>$pdo->query("SELECT COUNT(*) FROM bookings")->fetchColumn(),'pending'=>$pdo->query("SELECT COUNT(*) FROM bookings WHERE status='pending'")->fetchColumn(),'customers'=>$pdo->query("SELECT COUNT(*) FROM users")->fetchColumn()];
$recent=$pdo->query("SELECT b.*,u.name AS customer,m.name AS motorcycle FROM bookings b JOIN users u ON u.id=b.user_id JOIN motorcycles m ON m.id=b.motorcycle_id ORDER BY b.created_at DESC LIMIT 8")->fetchAll();
require '../includes/header.php'; ?>
<section class="page-banner">
    <div class="container">
        <div class="eyebrow">MANAGEMENT</div>
        <h1>Admin dashboard</h1>
        <p class="text-secondary mb-0">Welcome, <?= e($_SESSION['admin_name']??'Admin') ?>.</p>
    </div>
</section>
<div class="container-fluid admin-shell">
    <div class="row">
        <aside class="col-md-2 admin-sidebar">
            <a href="dashboard.php">
                <i class="bi bi-grid me-2"></i>Dashboard</a>
                <a href="motorcycles.php"><i class="bi bi-bicycle me-2"></i>Motorcycles</a>
                    <a href="bookings.php"><i class="bi bi-calendar-check me-2"></i>Bookings</a>
                    <a href="customers.php"><i class="bi bi-people me-2"></i>Customers</a>
                    <a href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
                </aside>
                <div class="col-md-10 p-4">
                    <div class="row g-3 mb-4"><?php foreach(['Motorcycles'=>'motorcycles','Bookings'=>'bookings','Pending requests'=>'pending','Customers'=>'customers'] as $label=>$key): ?><div class="col-sm-6 col-xl-3">
                        <div class="stat-card">
                            <div class="small-muted"><?= e($label) ?></div>
                            <strong><?= (int)$counts[$key] ?></strong>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="content-card">
                    <h4 class="fw-bold">Recent bookings</h4>
                    <div class="table-responsive"><table class="table"><thead><tr><th>Customer</th>
                    <th>Motorcycle</th>
                    <th>Dates</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody><?php foreach($recent as $r): ?><tr><td><?= e($r['customer']) ?></td>
                <td><?= e($r['motorcycle']) ?></td>
                <td><?= e($r['start_date']) ?> – <?= e($r['end_date']) ?></td>
                <td>₱<?= number_format((float)$r['total_amount'],2) ?></td>
                <td><?= e($r['status']) ?>
            </td>
            </tr>
            <?php endforeach; ?><?php if(!$recent): ?><tr><td colspan="5" class="text-secondary">No bookings yet.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
<?php require '../includes/footer.php'; ?>
