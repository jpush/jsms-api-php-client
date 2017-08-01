<?php
require_once __DIR__ . '/../src/JSMS.php';

$appKey = 'xxxx';
$masterSecret = 'xxxx';
$scheduleId = 'xxxxxx';

$client = new \JiGuang\JSMS($appKey, $masterSecret);

$response = $client->showSchedule($scheduleId);
print_r($response);

$response = $client->deleteSchedule($scheduleId);
print_r($response);
