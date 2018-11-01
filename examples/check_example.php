<?php
require __DIR__ . '/config.php';

$msg_id = 'xxxx';
$code = 'xxxxxx';

$response = $client->checkCode($msg_id, $code);

print_r($response);
