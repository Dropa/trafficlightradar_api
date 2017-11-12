<?php

namespace Drupal\trafficlight_api\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Congestion entities.
 *
 * @ingroup trafficlight_api
 */
interface CongestionInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Congestion name.
   *
   * @return string
   *   Name of the Congestion.
   */
  public function getName();

  /**
   * Sets the Congestion name.
   *
   * @param string $name
   *   The Congestion name.
   *
   * @return \Drupal\trafficlight_api\Entity\CongestionInterface
   *   The called Congestion entity.
   */
  public function setName($name);

  /**
   * Gets the Congestion creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Congestion.
   */
  public function getCreatedTime();

  /**
   * Sets the Congestion creation timestamp.
   *
   * @param int $timestamp
   *   The Congestion creation timestamp.
   *
   * @return \Drupal\trafficlight_api\Entity\CongestionInterface
   *   The called Congestion entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Congestion published status indicator.
   *
   * Unpublished Congestion are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Congestion is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Congestion.
   *
   * @param bool $published
   *   TRUE to set this Congestion to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\trafficlight_api\Entity\CongestionInterface
   *   The called Congestion entity.
   */
  public function setPublished($published);

}
