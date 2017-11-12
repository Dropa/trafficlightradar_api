<?php

namespace Drupal\trafficlight_api;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Traffic amount entities.
 *
 * @ingroup trafficlight_api
 */
class TrafficAmountListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Traffic amount ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\trafficlight_api\Entity\TrafficAmount */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.traffic_amount.edit_form',
      ['traffic_amount' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
