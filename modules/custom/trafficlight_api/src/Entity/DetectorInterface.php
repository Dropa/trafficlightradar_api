<?php

namespace Drupal\trafficlight_api\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Detector entities.
 *
 * @ingroup trafficlight_api
 */
interface DetectorInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Detector name.
   *
   * @return string
   *   Name of the Detector.
   */
  public function getName();

  /**
   * Sets the Detector name.
   *
   * @param string $name
   *   The Detector name.
   *
   * @return \Drupal\trafficlight_api\Entity\DetectorInterface
   *   The called Detector entity.
   */
  public function setName($name);

  /**
   * Gets the Detector creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Detector.
   */
  public function getCreatedTime();

  /**
   * Sets the Detector creation timestamp.
   *
   * @param int $timestamp
   *   The Detector creation timestamp.
   *
   * @return \Drupal\trafficlight_api\Entity\DetectorInterface
   *   The called Detector entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Detector published status indicator.
   *
   * Unpublished Detector are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Detector is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Detector.
   *
   * @param bool $published
   *   TRUE to set this Detector to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\trafficlight_api\Entity\DetectorInterface
   *   The called Detector entity.
   */
  public function setPublished($published);

}
