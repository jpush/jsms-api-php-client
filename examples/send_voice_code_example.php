<?php
require_once __DIR__ . '/../src/JSMS.php';

$appKey = 'xxxx';
$masterSecret = 'xxxx';
$phone = 'xxxxxxxxxxx';

$client = new \JiGuang\JSMS($appKey, $masterSecret);
$response = $client->sendVoiceCode($phone);
print_r($response);

$response = $client->sendVoiceCode($phone, [ 'ttl' => 30 ]);
print_r($response);

$response = $client->sendVoiceCode($phone, [ 'voice_lang' => 2 ]);
print_r($response);

$response = $client->sendVoiceCode($phone, [
    'ttl' => 30,
    'voice_lang' => 2,
    'code' => '6666'
]);
print_r($response);
