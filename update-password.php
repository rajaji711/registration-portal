
<?php
session_start();
$email = $_SESSION['email'];
$new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

$conn = new mysqli("localhost", "root", "", "registration_portal");
$conn->query("UPDATE users SET password='$new_password' WHERE email='$email'");

echo "✅ Password updated successfully.";
session_destroy();
?>
