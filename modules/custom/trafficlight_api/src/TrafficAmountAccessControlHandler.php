<?php

namespace Drupal\trafficlight_api;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Traffic amount entity.
 *
 * @see \Drupal\trafficlight_api\Entity\TrafficAmount.
 */
class TrafficAmountAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\trafficlight_api\Entity\TrafficAmountInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished traffic amount entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published traffic amount entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit traffic amount entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete traffic amount entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add traffic amount entities');
  }

}
