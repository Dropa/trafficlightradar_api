<?php

namespace Drupal\trafficlight_api;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Queue length entities.
 *
 * @ingroup trafficlight_api
 */
class QueueLengthListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Queue length ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\trafficlight_api\Entity\QueueLength */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.queue_length.edit_form',
      ['queue_length' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
