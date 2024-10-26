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
