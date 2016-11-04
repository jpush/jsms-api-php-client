<?php
require_once __DIR__ . '/../src/JSMS.php';

$appKey = 'xxxx';
$masterSecret = 'xxxx';
$phone = 'xxxxxxxxxxx';

$client = new \JiGuang\JSMS($appKey, $masterSecret);
$response = $client->sendCode($phone, 1);

print_r($response);
