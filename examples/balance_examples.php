<?php
require __DIR__ . '/config.php';

$response = $client->getAppBalance();
print_r($response);
