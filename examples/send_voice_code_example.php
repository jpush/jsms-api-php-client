<?php
require_once __DIR__ . '/../src/JSMS.php';

$appKey = 'xxxx';
$masterSecret = 'xxxx';
$phone = 'xxxxxxxxxxx';

$client = new \JiGuang\JSMS($appKey, $masterSecret);
$response = $client->sendVoiceCode($phone);

print_r($response);
