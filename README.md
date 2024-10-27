<a href="https://pma.techrahman.xyz">
    <img src="https://github.com/user-attachments/assets/1e2b487a-7333-48b3-8d25-379d08f3e660" alt="Description" width="300" />
</a>

## Step 1. Sign Up Aladinpaybd. Download Mobile App and instal your phone.
[https://aladinpaybd.com/](https://aladinpaybd.com/)

## Step 2.Collect Key.
1.Go to Device Collect Device Key.
2. Go to setting Collect. Your API KEY & Your SECRET KEY.
3.SignUp your Mobile use your email & device key.


## Step 3 goto your domain and create 3 file
---
> Index.php

```php
<?php
$amount = $_GET['amount'];
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://pay.aladinpaybd.com/request/payment/create',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
    'cus_name' => 'MY',
    'cus_email' => 'MY@gmail.com',
    'amount' => $amount,
    'success_url' => 'https://your_domain/success.php',
    'cancel_url' => 'https://your_domain/cancel.php'
  ),
  CURLOPT_HTTPHEADER => array(
    'app-key: ###',
    'secret-key: ###',
    'host-name: your_domain',
  ),
));

$response = curl_exec($curl);
curl_close($curl);
var_dump($response);
?>
```

---
> success.php
```php
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
```





---
> cancel.php
```php
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
``` 

