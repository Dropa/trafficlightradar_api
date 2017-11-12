<?php

$client = new \GuzzleHttp\Client();

dump($client->get('http://trafficlights.tampere.fi/api/v1/trafficAmount',[
    'headers' => [
        'Accept'     => 'application/json',
    ]
]));