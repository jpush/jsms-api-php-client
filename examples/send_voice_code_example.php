<?php
require __DIR__ . '/config.php';

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
