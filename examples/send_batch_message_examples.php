<?php
require __DIR__ . '/config.php';


/* 这里 $recipients 的格式是
$recipients = [
    $phone0 => $temp_para,
    $phone1 => $temp_para,
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

$response = $client->sendBatchMessage($temp_id, $recipients);
print_r($response);

// 定时批量短信
$time = '2017-08-31 12:04:44';
$response = $client->sendBatchMessage($temp_id, $recipients, $time);
print_r($response);
