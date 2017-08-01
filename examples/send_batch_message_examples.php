<?php
require_once __DIR__ . '/../src/JSMS.php';

$appKey = 'xxxx';
$masterSecret = 'xxxx';
$phone = 'xxxxxxxxxxx';

# 这里的 $temp_id 和 $temp_para 的值需要到 "极光控制台 -> 短信验证码 -> 模板管理" 里面获取
$temp_id = '6666';

/* 这里 $recipients 的格式是
$recipients = [
    $mobile => $temp_para,
    $mobile => $temp_para,
    ...
];

$temp_param 表示模板参数,需要替换的参数名和 value 的键值对
*/

$recipients = [
    '13800138000' => [ 'test' => 'jiguang0' ],
    '13800138001' => [ 'test' => 'jiguang1' ],
    '13800138002' => [ 'test' => 'jiguang2' ],
    '13800138003' => [ 'test' => 'jiguang3' ],
    '13800138004' => [ 'test' => 'jiguang4' ],
];


$client = new \JiGuang\JSMS($appKey, $masterSecret);
$response = $client->sendBatchMessage($temp_id, $recipients);

print_r($response);

