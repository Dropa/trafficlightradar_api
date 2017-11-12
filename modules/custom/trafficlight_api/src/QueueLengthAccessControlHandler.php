<?php

namespace Drupal\trafficlight_api;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Queue length entity.
 *
 * @see \Drupal\trafficlight_api\Entity\QueueLength.
 */
class QueueLengthAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\trafficlight_api\Entity\QueueLengthInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished queue length entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published queue length entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit queue length entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete queue length entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add queue length entities');
  }

}
