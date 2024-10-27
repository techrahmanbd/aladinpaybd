<?php
$id = $_GET['id'];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://pay.aladinpaybd.com/request/payment/verify',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => http_build_query(array('transaction_id' => $id)),
  CURLOPT_HTTPHEADER => array(
    'app-key: ####',
    'secret-key: ####',
    'host-name: your_domain',
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$responseData = json_decode($response, true);
header('Content-Type: application/json');
echo json_encode($responseData, JSON_PRETTY_PRINT);
?>
