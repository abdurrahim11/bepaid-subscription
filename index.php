<?php
// Setup request to send json via POST
//$return = route("/success-bepaid");
$data = array (
    'notification_url' => 'https://moin-ahmed.com/webhook/webhook.php',
    'return_url' => 'http://localhost/bepaid/ac',
    'tracking_id' => 332,
    'plan' =>
        array (
            'currency' => 'EUR',
            'plan' =>
                array (
                    'amount' => 99,
                    'interval' => 30,
                    'interval_unit' => 'day',
                ),
            'shop_id' => 361,
            'title' => 'Basic plan',
        ),
    'settings' =>
        array (
            'language' => 'it',
        ),
);


$host = "https://api.bepaid.by/subscriptions";
$process = curl_init($host);
$json = json_encode($data);
$shopId = 746724;
$shopKey = '';

curl_setopt($process, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-type: application/json'));
curl_setopt($process, CURLOPT_POST, 1);
curl_setopt($process, CURLOPT_POSTFIELDS, $json);

curl_setopt($process, CURLOPT_URL, $host);
curl_setopt($process, CURLOPT_USERPWD, $shopId . ":" . $shopKey);
curl_setopt($process, CURLOPT_TIMEOUT, 30);
curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($process);
$error = curl_error($process);
curl_close($process);


$result = json_decode($response);
print_r($result->redirect_url);