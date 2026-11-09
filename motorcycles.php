<?php
require_once 'config.php'; $pageTitle='Motorcycles';
$category=trim($_GET['category']??'');
$sql="SELECT * FROM motorcycles WHERE availability='available'"; $params=[];
if($category!==''){ $sql.=" AND category=?"; $params[]=$category; }
$sql.=" ORDER BY name";
$st=$pdo->prepare($sql);$st->execute($params);$bikes=$st->fetchAll();
$categories=$pdo->query("SELECT DISTINCT category FROM motorcycles ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
require 'includes/header.php'; ?>
<section class="page-banner"><div class="container"><div class="eyebrow">FIND YOUR RIDE</div><h1>Our motorcycles</h1><p class="text-secondary mb-0">Choose a motorcycle and send your booking request.</p></div></section>
<section class="section-pad"><div class="container"><form class="row g-2 mb-4"><div class="col-md-4"><select class="form-select" name="category"><option value="">All categories</option><?php foreach($categories as $c): ?><option value="<?= e($c) ?>" <?= $category===$c?'selected':'' ?>><?= e($c) ?></option><?php endforeach; ?></select></div><div class="col-auto"><button class="btn btn-dark">Filter</button></div></form>
<div class="row g-4"><?php if(!$bikes): ?><div class="col-12"><div class="alert alert-info">No available motorcycles found.</div></div><?php endif; ?>
<?php foreach($bikes as $bike): ?><div class="col-sm-6 col-lg-4"><div class="bike-card"><img class="bike-img" src="<?= e($bike['image'] ?: 'assets/images/hero-motorcycle.svg') ?>" alt="<?= e($bike['name']) ?>"><div class="card-body"><div class="small-muted"><?= e($bike['category']) ?> · <?= e($bike['transmission']) ?></div><h5 class="fw-bold"><?= e($bike['name']) ?></h5><p class="small-muted"><?= e($bike['description']) ?></p><div class="d-flex justify-content-between align-items-center"><div class="price">₱<?= number_format((float)$bike['price_per_day'],2) ?><small> / day</small></div><a class="btn btn-yellow btn-sm" href="book.php?id=<?= (int)$bike['id'] ?>">Book now</a></div></div></div></div><?php endforeach; ?></div></div></section>
<?php require 'includes/footer.php'; ?>
