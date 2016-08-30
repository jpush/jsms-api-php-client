<?php
require_once __DIR__ . '/../src/Jsms.php';

$appKey = 'xxxx';
$masterSecret = 'xxxx';
$msg_id = 'xxxx';
$code = 'xxxxxx';

$client = new \JPush\Jsms($appKey, $masterSecret);
$response = $client->checkCode($msg_id, $code);

print_r($response);
