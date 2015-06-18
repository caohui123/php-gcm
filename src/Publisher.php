<?php

namespace GianArb\GDM;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Publisher
{
    private $client;
    private $options;
    private $accessKey;

    public function __construct(
        Client $client,
        $accessKeyId,
        $options = [
            'endpoint' => 'https://android.googleapis.com/gcm/send',
        ]
    ) {
        $this->client = $client;
        $this->options = $options;
        $this->accessKey = $accessKeyId;
    }

    public function push(array $deviceTokens, $data)
    {
        $headers = [
            'Authorization' => "key={$this->accessKey}",
            'Content-Type' => 'application/json'
        ];
        $request = new Request('POST', $this->options['endpoint'], $headers, json_encode([
            'registration_ids'  => $deviceTokens,
            'data' => $data,
        ]));

        return $this->client->send($request);
    }
}
