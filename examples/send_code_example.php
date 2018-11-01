<?php
require __DIR__ . '/config.php';

# 发送文本验证码短信 API
$response = $client->sendCode($phone, 1);
print_r($response);
