<?php

namespace Drupal\trafficlight_api\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Traffic amount entities.
 *
 * @ingroup trafficlight_api
 */
interface TrafficAmountInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Traffic amount name.
   *
   * @return string
   *   Name of the Traffic amount.
   */
  public function getName();

  /**
   * Sets the Traffic amount name.
   *
   * @param string $name
   *   The Traffic amount name.
   *
   * @return \Drupal\trafficlight_api\Entity\TrafficAmountInterface
   *   The called Traffic amount entity.
   */
  public function setName($name);

  /**
   * Gets the Traffic amount creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Traffic amount.
   */
  public function getCreatedTime();

  /**
   * Sets the Traffic amount creation timestamp.
   *
   * @param int $timestamp
   *   The Traffic amount creation timestamp.
   *
   * @return \Drupal\trafficlight_api\Entity\TrafficAmountInterface
   *   The called Traffic amount entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Traffic amount published status indicator.
   *
   * Unpublished Traffic amount are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Traffic amount is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Traffic amount.
   *
   * @param bool $published
   *   TRUE to set this Traffic amount to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\trafficlight_api\Entity\TrafficAmountInterface
   *   The called Traffic amount entity.
   */
  public function setPublished($published);

}
