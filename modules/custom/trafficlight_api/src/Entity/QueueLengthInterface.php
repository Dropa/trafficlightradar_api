<?php

namespace Drupal\trafficlight_api\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Queue length entities.
 *
 * @ingroup trafficlight_api
 */
interface QueueLengthInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Queue length name.
   *
   * @return string
   *   Name of the Queue length.
   */
  public function getName();

  /**
   * Sets the Queue length name.
   *
   * @param string $name
   *   The Queue length name.
   *
   * @return \Drupal\trafficlight_api\Entity\QueueLengthInterface
   *   The called Queue length entity.
   */
  public function setName($name);

  /**
   * Gets the Queue length creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Queue length.
   */
  public function getCreatedTime();

  /**
   * Sets the Queue length creation timestamp.
   *
   * @param int $timestamp
   *   The Queue length creation timestamp.
   *
   * @return \Drupal\trafficlight_api\Entity\QueueLengthInterface
   *   The called Queue length entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Queue length published status indicator.
   *
   * Unpublished Queue length are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Queue length is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Queue length.
   *
   * @param bool $published
   *   TRUE to set this Queue length to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\trafficlight_api\Entity\QueueLengthInterface
   *   The called Queue length entity.
   */
  public function setPublished($published);

}
