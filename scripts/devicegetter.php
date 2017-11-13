<?php


$base_uri = 'http://opendata.navici.com/tampere/opendata/ows?service=WFS&version=2.0.0&request=GetFeature&typeName=opendata:';
$tail_uri = '&outputFormat=json&srsName=EPSG:4326';
$apis = [
    'WFS_LIIKENNEVALO_ILMAISIN',
    //'WFS_LIIKENNEVALO_LAITE',
    //'WFS_LIIKENNEVALO_LIITTYMA'
];

$fetch = [];
$client = new \GuzzleHttp\Client();

foreach ($apis as $api) {
    $response = $client->get("{$base_uri}{$api}{$tail_uri}",[
        'headers' => [
            'Accept' => 'application/json',
        ]
    ]);
    if ($response->getStatusCode() != 200) {
        continue;
    }
    $json = json_decode($response->getBody()->getContents(), true);
    foreach ($json['features'] as $feature) {
        $f = $feature['properties'];
        $device = 'tre';
        if (!isset($f['LIITTYMAN_NRO']) || !$f['LIITTYMAN_NRO'] || !isset($f['TUNNUS']) || !$f['TUNNUS']){
            continue;
        }
        $device .= $f['LIITTYMAN_NRO'];
        /*
        elseif (isset($fuk['LIITTYMAN_NIMI'])) {
            $i .= $fuk['LIITTYMAN_NIMI'];
        }
        elseif (isset($fuk['NUMERO'])) {
            $i .= $fuk['NUMERO'];
        }
        */
        $detector = strtolower($f['TUNNUS']);
        $detector = str_replace('-', '_', $detector);
        $detector = str_replace(' ', '', $detector);
        $fetch[$device][$detector] = [
            'field_longitude' => (string) $feature['geometry']['coordinates'][1],
            'field_latitude' => (string) $feature['geometry']['coordinates'][0],
            'field_detector_type' => $f['TYYPPI'],
            'field_detector_type_code' => $f['TYYPPI_KOODI'],
            'field_detector_id' => $f['ILMAISIN_ID'],
        ];
    }
}
if (!$fetch) {
    return;
}
asort($fetch);

$query = \Drupal::entityQuery('device')
    ->condition('name', array_keys($fetch), 'IN')
    ->execute();
/** @var \Drupal\trafficlight_api\Entity\Device[] $devices */
$devices = \Drupal\trafficlight_api\Entity\Device::loadMultiple($query);

$found_devices = [];
foreach ($devices as $device) {
    $found_devices[$device->id()] = $fetch[$device->label()];
}
unset($fetch);

$updated = 0;

foreach ($found_devices as $device_id => $fetched_detectors) {
    $query = \Drupal::entityQuery('detector')
        ->condition('field_device', $device_id)
        ->condition('name', array_keys($fetched_detectors), 'IN')
        ->execute();
    if (!$query) {
        unset($found_devices[$device_id]);
        continue;
    }
    /** @var \Drupal\trafficlight_api\Entity\Detector[] $detectors */
    $detectors = \Drupal\trafficlight_api\Entity\Detector::loadMultiple($query);
    foreach ($detectors as $detector) {
        $values = $fetched_detectors[$detector->label()];
        foreach ($values as $field => $value) {
            $detector->set($field, $value);
        }
        $updated++;
        $detector->save();
    }
}

echo "Updated {$updated} detectors" . PHP_EOL;