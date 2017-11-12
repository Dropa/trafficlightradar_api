<?php

namespace Drupal\trafficlight_api\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Device entities.
 *
 * @ingroup trafficlight_api
 */
interface DeviceInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Device name.
   *
   * @return string
   *   Name of the Device.
   */
  public function getName();

  /**
   * Sets the Device name.
   *
   * @param string $name
   *   The Device name.
   *
   * @return \Drupal\trafficlight_api\Entity\DeviceInterface
   *   The called Device entity.
   */
  public function setName($name);

  /**
   * Gets the Device creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Device.
   */
  public function getCreatedTime();

  /**
   * Sets the Device creation timestamp.
   *
   * @param int $timestamp
   *   The Device creation timestamp.
   *
   * @return \Drupal\trafficlight_api\Entity\DeviceInterface
   *   The called Device entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Device published status indicator.
   *
   * Unpublished Device are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Device is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Device.
   *
   * @param bool $published
   *   TRUE to set this Device to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\trafficlight_api\Entity\DeviceInterface
   *   The called Device entity.
   */
  public function setPublished($published);

}
