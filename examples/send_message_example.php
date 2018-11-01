<?php
require __DIR__ . '/config.php';

# 这里的 $temp_id 和 $temp_para 的值需要到 "极光控制台 -> 短信验证码 -> 模板管理" 里面获取
$temp_id = '6666';
$temp_para = ['test' => 'jiguang'];

$response = $client->sendMessage($phone, $temp_id, $temp_para);
print_r($response);

// will threw an InvalidArgumentException:
// $client->sendMessage($phone, $temp_id, 'temp_para');


// 定时短信
$time = '2017-08-31 12:04:44';
$response = $client->sendMessage($phone, $temp_id, $temp_para, $time);
print_r($response);
