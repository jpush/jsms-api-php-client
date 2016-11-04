<?php
require_once __DIR__ . '/../src/JSMS.php';

$appKey = 'xxxx';
$masterSecret = 'xxxx';
$phone = 'xxxxxxxxxxx';

# 这里的 $temp_id 和 $temp_para 的值需要到 "极光控制台 -> 短信验证码 -> 模板管理" 里面获取
$temp_id = '6666';
$temp_para = ['test' => 'jiguang'];

$client = new \JiGuang\JSMS($appKey, $masterSecret);
$response = $client->sendMessage($phone, $temp_id, $temp_para);

print_r($response);

// will threw an InvalidArgumentException:
// $client->sendMessage($phone, $temp_id, 'temp_para');
