<?php
require __DIR__ . '/config.php';

$scheduleId = 'xxxxxx';


$response = $client->showSchedule($scheduleId);
print_r($response);

$response = $client->deleteSchedule($scheduleId);
print_r($response);
