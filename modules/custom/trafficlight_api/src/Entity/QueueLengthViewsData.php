<?php

namespace Drupal\trafficlight_api\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Queue length entities.
 */
class QueueLengthViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}
