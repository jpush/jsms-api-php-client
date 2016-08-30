<?php
require_once __DIR__ . '/../src/Jsms.php';

$appKey = 'xxxx';
$masterSecret = 'xxxx';
$phone = 'xxxxxxxxxxx';

$client = new \JPush\Jsms($appKey, $masterSecret);
$response = $client->sendCode($phone, 1);

print_r($response);
