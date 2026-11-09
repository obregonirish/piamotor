<?php
require_once 'config.php';
$pageTitle = 'Home';
$featured = $pdo->query("SELECT * FROM motorcycles WHERE availability='available' ORDER BY id DESC LIMIT 3")->fetchAll();
require 'includes/header.php';
?>
<section class="hero"><div class="container"><div class="hero-copy">
  <div class="eyebrow mb-3">YOUR RIDE. YOUR JOURNEY.</div>
  <h1>Ride your <span>way.</span><br>Explore more.</h1>
  <p>Find the right motorcycle for your next trip. Simple booking, dependable rides, and the freedom to explore on your own schedule.</p>
  <a class="btn btn-yellow me-2" href="motorcycles.php">Explore motorcycles <i class="bi bi-arrow-right"></i></a>
  <a class="btn btn-outline-yellow" href="about.php">Learn more</a>
</div></div></section>
<section class="section-pad"><div class="container">
  <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4"><div><div class="section-kicker">CHOOSE YOUR RIDE</div><h2 class="section-title">Featured motorcycles</h2></div><a href="motorcycles.php" class="fw-bold text-dark">View all <i class="bi bi-arrow-right"></i></a></div>
  <div class="row g-4">
  <?php if (!$featured): ?><div class="col-12"><div class="alert alert-info">Motorcycles will appear here once they are added in the admin dashboard.</div></div><?php endif; ?>
  <?php foreach ($featured as $bike): ?>
    <div class="col-md-4"><div class="bike-card">
      <img class="bike-img" src="<?= e($bike['image'] ?: 'assets/images/hero-motorcycle.svg') ?>" alt="<?= e($bike['name']) ?>">
      <div class="card-body"><div class="small-muted"><?= e($bike['category']) ?></div><h5 class="fw-bold"><?= e($bike['name']) ?></h5><div class="d-flex justify-content-between align-items-center mt-3"><div class="price">₱<?= number_format((float)$bike['price_per_day'],2) ?><small> / day</small></div><a class="btn btn-yellow btn-sm" href="book.php?id=<?= (int)$bike['id'] ?>">Book now</a></div></div>
    </div></div>
  <?php endforeach; ?>
  </div>
</div></section>
<section class="dark-section section-pad"><div class="container"><div class="text-center mb-5"><div class="eyebrow">WHY RIDE WITH PIA?</div><h2 class="section-title">Your trip starts here</h2></div><div class="row g-4">
  <div class="col-md-4"><div class="feature-box"><i class="bi bi-bicycle fs-2 text-warning"></i><h5 class="mt-3 fw-bold">Rides for your plans</h5><p class="text-secondary mb-0">Browse motorcycle options and choose the ride that suits your trip.</p></div></div>
  <div class="col-md-4"><div class="feature-box"><i class="bi bi-calendar-check fs-2 text-warning"></i><h5 class="mt-3 fw-bold">Easy booking</h5><p class="text-secondary mb-0">Send your rental dates online and track your booking status.</p></div></div>
  <div class="col-md-4"><div class="feature-box"><i class="bi bi-shield-check fs-2 text-warning"></i><h5 class="mt-3 fw-bold">Clear information</h5><p class="text-secondary mb-0">View motorcycle details and rental rates before you book.</p></div></div>
</div></div></section>
<?php require 'includes/footer.php'; ?>
