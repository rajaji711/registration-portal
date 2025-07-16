
<?php
session_start();
if ($_POST['otp'] != $_SESSION['otp']) {
    die("Invalid OTP.");
}
?>
<!DOCTYPE html>
<html>
<head><title>Reset Password</title></head>
<body>
  <form action="update-password.php" method="POST">
    <input type="password" name="new_password" required placeholder="New Password">
    <button type="submit">Reset Password</button>
  </form>
</body>
</html>
