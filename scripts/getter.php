<?php

$client = new \GuzzleHttp\Client();

$base_uri = 'http://trafficlights.tampere.fi/api/v1/';
$apis = ['trafficAmount', 'congestion', 'queueLength'];
foreach ($apis as $api) {
    echo "Getting {$api}..." . PHP_EOL;
    $response = $client->get($base_uri . $api,[
        'headers' => [
            'Accept'     => 'application/json',
        ]
    ]);
    if ($response->getStatusCode() != 200) {
        continue;
    }
    $json = json_decode($response->getBody()->getContents(), true);
}