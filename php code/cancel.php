<?php
$transactionId = $_GET['transactionId'];
$paymentAmount = $_GET['paymentAmount'];
$paymentFee = $_GET['paymentFee'];
$success = $_GET['success']; 
if ($success == '0') {
    echo "Payment Failed. Transaction ID: " . $transactionId;
    echo "<br>Amount: " . $paymentAmount;
    echo "<br>We couldn't process your payment at this time. Please try again.";
} else {
    echo "Unexpected error occurred.";
}
?>
