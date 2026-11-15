
<?php
require_once '../config.php';

$pageTitle = 'Admin Registration';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $passkey = $_POST['passkey'] ?? '';

    if ($passkey !== 'admin1423') {
        $error = 'Invalid admin passkey.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } elseif (strlen($password) < 8) {
        $error = 'Password must be at least 8 characters.';
    } else {
        $check = $pdo->prepare(
            "SELECT id FROM admins WHERE email = ?"
        );
        $check->execute([$email]);

        if ($check->fetch()) {
            $error = 'Email is already registered.';
        } else {
            $hashedPassword = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $st = $pdo->prepare(
                "INSERT INTO admins (name, email, password)
                 VALUES (?, ?, ?)"
            );

            $st->execute([
                $name,
                $email,
                $hashedPassword
            ]);

            $success = 'Admin account created successfully! You can now log in.';
        }
    }
}

require '../includes/header.php';
?>

<div class="auth-wrap">
    <div class="auth-card">

        <div class="auth-panel">
            <div class="eyebrow">MANAGEMENT PORTAL</div>

            <h2 class="fw-black mb-4">Admin Registration</h2>

            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <?= e($error) ?>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="alert alert-success">
                    <?= e($success) ?>
                </div>
            <?php endif; ?>

            <form method="POST">

                <input type="hidden" name="csrf_token"
                       value="<?= e(csrf_token()) ?>">

                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" name="name"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="email" name="email"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password"
                           class="form-control" minlength="8" required>
                </div>

                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Admin Passkey</label>
                    <input type="password" name="passkey"
                           class="form-control" required>
                </div>

                <button class="btn btn-yellow w-100">
                    Register as Admin
                </button>

            </form>

            <a href="login.php"
               class="small text-warning d-inline-block mt-3">
                Already have an account? Login
            </a>

            <br>

            <a href="../index.php"
               class="small text-warning d-inline-block mt-2">
                Back to website
            </a>

        </div>

        <div class="auth-side">
            <div>
                <div class="eyebrow">PIA MOTOR RENTAL</div>
                <h2>ADMIN <span>PORTAL</span></h2>
                <p>Register to manage your motorcycle rental system.</p>
            </div>
        </div>

    </div>
</div>

<?php require '../includes/footer.php'; ?>
