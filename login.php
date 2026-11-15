<?php
require_once 'config.php'; $pageTitle='Log in'; $error='';
if($_SERVER['REQUEST_METHOD']==='POST'){verify_csrf();$email=trim($_POST['email']??'');$password=$_POST['password']??'';$st=$pdo->prepare("SELECT * FROM users WHERE email=?");$st->execute([$email]);$user=$st->fetch();
 if($user&&password_verify($password,$user['password'])){session_regenerate_id(true);$_SESSION['user_id']=$user['id'];$_SESSION['user_name']=$user['name'];header('Location: index.php');exit;} $error='Incorrect email or password.';}
require 'includes/header.php'; ?>
<div class="auth-wrap">
    <div class="auth-card">
        <div class="auth-panel">
            <div class="eyebrow">WELCOME BACK</div>
            <h2 class="fw-black mb-4">Customer login</h2>
            <?php if($error): ?>
                <div class="alert alert-danger"><?= e($error) ?></div>
                <?php endif; ?>
                <form method="post">
                    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
                    <div class="mb-3">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button class="btn btn-yellow w-100">Log in</button>
                </form>
                <p class="small text-secondary mt-3">No account yet? 
                    <a href="register.php" class="text-warning">Register here</a>
                </p><hr class="border-secondary"><a href="admin/login.php" class="small text-warning">Admin login</a></div>
                <div class="auth-side"><div>
                    <div class="eyebrow">WELCOME TO</div>
                    <h2>PIA <span>MOTOR RENTAL</span></h2>
                <p class="text-light small">Ride your way. Explore more.</p>
            </div>
        </div>
        </div>
    </div>

