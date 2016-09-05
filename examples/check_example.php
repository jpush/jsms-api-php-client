<?php
require_once __DIR__ . '/../src/JSMS.php';

$appKey = 'xxxx';
$masterSecret = 'xxxx';
$msg_id = 'xxxx';
$code = 'xxxxxx';

$client = new \JiGuang\JSMS($appKey, $masterSecret);
$response = $client->checkCode($msg_id, $code);

print_r($response);
