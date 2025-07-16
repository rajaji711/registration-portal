<?php
session_start();
$email = $_POST['email'];

$conn = new mysqli("localhost", "root", "", "registration_portal");
$res = $conn->query("SELECT * FROM users WHERE email='$email'");
if ($res->num_rows == 0) {
    die("Email not registered.");
}

$otp = rand(100000, 999999);
$_SESSION['otp'] = $otp;
$_SESSION['email'] = $email;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'awesomerajag@gmail.com'; // <-- Enter your Gmail address here
    $mail->Password   = 'ovgq nfbv nrzi yics'; // <-- Enter your Gmail App Password here
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('awesomerajag@gmail.com', 'No Reply');
    $mail->addAddress($email);

    //Content
    $mail->Subject = "Your OTP Code";
    $mail->Body    = "Your OTP is: $otp";

    $mail->send();
    header("Location: verify-otp.php");
    exit();
} catch (Exception $e) {
    die("Failed to send OTP. Mailer Error: {$mail->ErrorInfo}");
}
?>
