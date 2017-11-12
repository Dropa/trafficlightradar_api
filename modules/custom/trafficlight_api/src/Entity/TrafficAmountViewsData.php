<?php

namespace Drupal\trafficlight_api\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Traffic amount entities.
 */
class TrafficAmountViewsData extends EntityViewsData {

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
