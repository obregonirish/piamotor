<?php
require_once 'config.php'; $pageTitle='Contact';
$sent=false;
if ($_SERVER['REQUEST_METHOD']==='POST') { verify_csrf(); $name=trim($_POST['name']??''); $email=trim($_POST['email']??''); $message=trim($_POST['message']??'');
 if ($name && filter_var($email,FILTER_VALIDATE_EMAIL) && $message) { $st=$pdo->prepare("INSERT INTO messages(name,email,message) VALUES(?,?,?)"); $st->execute([$name,$email,$message]); $sent=true; }
}
require 'includes/header.php'; ?>
<section class="page-banner"><div class="container"><div class="eyebrow">WE'RE HERE TO HELP</div><h1>Get in touch</h1></div></section>
<section class="section-pad"><div class="container"><div class="row g-4"><div class="col-lg-5"><div class="section-kicker">CONTACT PIA</div><h2 class="section-title">Let's talk about your next ride.</h2><p class="text-secondary">Send us a message using the form. Add your official phone number, email, and business address here before publishing your website.</p><p><i class="bi bi-envelope me-2"></i>your-email@example.com</p><p><i class="bi bi-telephone me-2"></i>+63 XXX XXX XXXX</p></div><div class="col-lg-7"><div class="content-card"><?php if($sent): ?><div class="alert alert-success">Your message has been sent.</div><?php endif; ?><form method="post"><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><div class="mb-3"><label class="form-label">Full name</label><input class="form-control" name="name" required></div><div class="mb-3"><label class="form-label">Email address</label><input type="email" class="form-control" name="email" required></div><div class="mb-3"><label class="form-label">Message</label><textarea class="form-control" name="message" rows="5" required></textarea></div><button class="btn btn-yellow">Send message</button></form></div></div></div></div></section>
<?php require 'includes/footer.php'; ?>
