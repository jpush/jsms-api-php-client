<?php
namespace JiGuang;

class Sign {

    const BASE_URI = 'https://api.sms.jpush.cn/v1/sign/';
    private $client;

    public function __construct($client) {
        $this->client = $client;
    }

    public function create($sign, $image0=null, $image1=null, $image2=null, $image3=null) {
        $uri = self::BASE_URI;
        $response = $this->form($uri, $sign, $image0, $image1, $image2, $image3);
        return $response;
    }

    public function update($signId, $sign, $image0=null, $image1=null, $image2=null, $image3=null) {
        $uri = self::BASE_URI . $signId;
        $response = $this->form($uri, $sign, $image0, $image1, $image2, $image3);
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

    private function form($uri, $sign, $image0, $image1, $image2, $image3) {
        $headers = [ 'Content-Type: multipart/form-data' ];
        $body = ['sign' => $sign ];
        $uploads = [];
        $images = [
            'image0' => $image0,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3
        ];
        foreach ($images as $key => $value) {
            if (!is_null($value)) {
                if (class_exists('\CURLFile')) {
                    $uploads[$key] = new \CURLFile($value);
                } else {
                    $uploads[$key] = '@' . $value;
                }
            }
        }
        return $this->client->request('POST', $uri, $body, $headers, $uploads);
    }
}
