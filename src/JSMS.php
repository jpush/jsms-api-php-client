<?php

namespace JiGuang;

final class JSMS {

    const code_url = 'https://api.sms.jpush.cn/v1';

    private $appKey;
    private $masterSecret;
    private $options;

    public function __construct($appKey, $masterSecret, array $options = array()) {
        $this->appKey = $appKey;
        $this->masterSecret = $masterSecret;
        $this->options = array_merge([
            'ssl_verify'=> true
        ], $options);
    }

    public function sendCode($mobile, $temp_id) {
        $url = self::code_url . '/codes';
        $body = array('mobile' => $mobile, 'temp_id' => $temp_id);
        return $this->sendPost($url, $body);
    }

    public function sendVoiceCode($mobile, $ttl=null) {
        $url = self::code_url . '/voice_codes';
        $body = array('mobile' => $mobile, 'ttl' => $ttl);
        return $this->sendPost($url, $body);
    }

    public function checkCode($msg_id, $code) {
        $url = self::code_url . '/codes/' . $msg_id . "/valid";
        $body = array('code' => $code);
        return $this->sendPost($url, $body);
    }

    public function sendMessage($mobile, $temp_id, $temp_para) {
        if(!is_array($temp_para)) {
            throw new \InvalidArgumentException("Argument temp_para must be an array");
        }
        $url = self::code_url . '/messages';
        $body = array(
            'mobile' => $mobile,
            'temp_id' => $temp_id,
            'temp_para' => $temp_para
        );
        return $this->sendPost($url, $body);
    }

    private function sendPost($url, $body) {
        $ch = curl_init();
        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Connection: Keep-Alive'
            ),
            CURLOPT_USERAGENT => 'JSMS-API-PHP-CLIENT',
            CURLOPT_CONNECTTIMEOUT => 20,
            CURLOPT_TIMEOUT => 120,

            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $this->appKey . ":" . $this->masterSecret,

            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($body)
        );
        if (!$this->options['ssl_verify']) {
            $options[CURLOPT_SSL_VERIFYPEER] = false;
            $options[CURLOPT_SSL_VERIFYHOST] = 0;
        }
        curl_setopt_array($ch, $options);
        $output = curl_exec($ch);

        if($output === false) {
            return "Error Code:" . curl_errno($ch) . ", Error Message:".curl_error($ch);
        } else {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $header_text = substr($output, 0, $header_size);
            $body = substr($output, $header_size);

            $response['body'] = $body;
            $response['http_code'] = $httpCode;
        }
        curl_close($ch);
        return $response;
    }
}
