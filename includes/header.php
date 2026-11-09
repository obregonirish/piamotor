<?php
$pageTitle = $pageTitle ?? 'PIA Motor Rental';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($pageTitle) ?> | PIA Motor Rental</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark site-nav sticky-top">
  <div class="container">
    <a class="navbar-brand fw-black" href="<?= BASE_URL ?>index.php"><span class="brand-mark">P</span> PIA <span class="brand-yellow">MOTOR RENTAL</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>about.php">About us</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>motorcycles.php">Motorcycles</a></li>
        <li class="nav-item"><a class="btn btn-yellow ms-lg-2" href="<?= BASE_URL ?>motorcycles.php">Book now</a></li>
        <?php if (is_logged_in()): ?>
          <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>my_bookings.php">My bookings</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>logout.php">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>login.php">Log in</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>register.php">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<main>
