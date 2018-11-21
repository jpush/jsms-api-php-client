<?php
namespace JiGuang;

class Sign {

    const BASE_URI = 'https://api.sms.jpush.cn/v1/sign/';
    private $client;

    public function __construct($client) {
        $this->client = $client;
    }

    public function create($sign, $image0=null, $type=null, $remark=null) {
        $uri = self::BASE_URI;
        $response = $this->form($uri, $sign, $image0, $type, $remark);
        return $response;
    }

    public function update($signId, $sign, $image0=null, $type=null, $remark=null) {
        $uri = self::BASE_URI . $signId;
        $response = $this->form($uri, $sign, $image0, $type, $remark);
        return $response;
    }

    public function show($signId) {
        $uri = self::BASE_URI . $signId;
        return $this->client->request('GET', $uri);
    }

    public function delete($signId) {
        $uri = self::BASE_URI . $signId;
        return $this->client->request('DELETE', $uri);
    }

    private function form($uri, $sign, $image0, $type, $remark) {
        $headers = [ 'Content-Type: multipart/form-data' ];
        $body = [
            'sign'      => $sign,
            'image0'    => $image0,
            'type'      => $type,
            'remark'    => $remark
        ];

        $uploads = array();
        if (!is_null($image0)) {
            if (class_exists('\CURLFile')) {
                $uploads['image0'] = new \CURLFile($image0);
            } else {
                $uploads['image0'] = '@' . $image0;
            }
        }
        return $this->client->request('POST', $uri, $body, $headers, $uploads);
    }
}
