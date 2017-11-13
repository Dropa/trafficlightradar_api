<?php


$running = \Drupal::state()->get('outdate_remover_running');
if ($running) {
    echo "Already running." . PHP_EOL;
    return;
}
\Drupal::state()->set('outdate_remover_running', TRUE);

function delete_outdated($entity_type) {
    $day = 60 * 60 * 24;
    $storage = \Drupal::entityTypeManager()->getStorage($entity_type);
    $query = $storage->getQuery()
        ->condition('created', time() - $day, '<')
        ->execute();
    $count = count($query);
    $progress = 0;
    foreach (array_chunk($query, 100) as $chunk) {
        /** @var \Drupal\Core\Entity\ContentEntityInterface[] $entities */
        $entities = $storage->loadMultiple($chunk);
        $storage->delete($entities);
        $progress += count($chunk);
        echo round($progress / $count * 100, 3) . "% of {$count} outdated {$entity_type} removed." . PHP_EOL;
    }
    \Drupal::logger('traffic')->notice("Removed {$count} outdated entities from {$entity_type}.");
}

$apis = ['trafficAmount', 'congestion', 'queueLength'];
foreach ($apis as $api) {
    delete_outdated(trafficlight_api_getStorageKey($api));
}

\Drupal::state()->set('outdate_remover_running', FALSE);
