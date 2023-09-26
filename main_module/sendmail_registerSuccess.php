<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';

require_once '../utils/config.php';

// session_start();

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  // Your SMTP server host
$mail->SMTPAuth = true;
$mail->Username = 'dodat.ptit@gmail.com'; // Your SMTP username
$mail->Password = 'pkduyqgdinkqxskc'; // Your SMTP password
$mail->SMTPSecure = 'ssl';          // Encryption (tls or ssl)
$mail->Port = 465;                  // SMTP port (usually 587 for TLS)

// Set email details
$mail->setFrom('dodat.ptit@gmail.com', 'MoonlightFestival');
$mail->addAddress($email, 'Customer');
$mail->isHTML(true);
$mail->Subject = 'Account Registration Confirmation';

// Truy cập thông tin đăng nhập từ session
$username = $_SESSION['username'];
$password = $_SESSION['password'];

// Thêm thông tin đăng nhập vào nội dung email
$mail->Body = "Thank you for registering an account with us. Here is your login information:<br>Username: $username<br>Password: $password";

$success = $mail->send();

// Xóa thông tin đăng nhập khỏi session sau khi sử dụng
unset($_SESSION['username']);
unset($_SESSION['password']);
