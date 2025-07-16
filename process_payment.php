<?php
$feesType = $_POST['fees'];
$amount = 0;

// Set amount based on fees type
if ($feesType == 'collegefees') {
    $amount = 1000; // Example amount
} elseif ($feesType == 'messfees') {
    $amount = 500;
} elseif ($feesType == 'otherfees') {
    $amount = 200;
}

// PayPal Sandbox credentials
$paypalUrl = "https://www.sandbox.paypal.com/cgi-bin/webscr";
$businessEmail = "awesomerajaji@gmail.com"; // Replace with your PayPal sandbox business email

?>
<form action="<?php echo $paypalUrl; ?>" method="post">
    <input type="hidden" name="business" value="<?php echo $businessEmail; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="<?php echo strtoupper($feesType); ?>">
    <input type="hidden" name="amount" value="<?php echo $amount; ?>">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="return" value="success.php">
    <input type="hidden" name="cancel_return" value="cancel.php">
    <button type="submit">Pay with PayPal Sandbox</button>
</form>