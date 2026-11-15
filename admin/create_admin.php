<?php
// Run this ONCE in your browser after importing database.sql, then DELETE this file.
require_once '../config.php';
$email = 'ayrish@gmail.com';
$password = 'ayrish123123';
$name = 'PIA Administrator';
$hash = password_hash($password, PASSWORD_DEFAULT);
$st = $pdo->prepare("INSERT INTO admins(name,email,password) VALUES(?,?,?) ON DUPLICATE KEY UPDATE name=VALUES(name), password=VALUES(password)");
$st->execute([$name,$email,$hash]);
echo 'Admin account created. Email: ' . htmlspecialchars($email) . ' | Password: ' . htmlspecialchars($password) . '<br>IMPORTANT: delete admin/create_admin.php now and change the password after your first login.';
