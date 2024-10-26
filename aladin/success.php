<?php
$transactionId = isset($_GET['transactionId']) ? $_GET['transactionId'] : null;
$paymentAmount = isset($_GET['paymentAmount']) ? $_GET['paymentAmount'] : null;
$success = isset($_GET['success']) ? $_GET['success'] : null;

if ($success == '1') {
    echo "Payment Successful!";
    echo "<br>Amount: $paymentAmount";
    echo "<br>নিচে ট্রানজেকশন আইডি কপি করুন।";
    echo "<br>Transaction ID: " . $transactionId;
} else {
    echo "Payment failed.";
}
?>
