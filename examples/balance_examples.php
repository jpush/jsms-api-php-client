<?php
require_once __DIR__ . '/../src/JSMS.php';

$appKey = 'xxxx';
$masterSecret = 'xxxx';

$client = new \JiGuang\JSMS($appKey, $masterSecret);

$response = $client->getAppBalance();
print_r($response);
