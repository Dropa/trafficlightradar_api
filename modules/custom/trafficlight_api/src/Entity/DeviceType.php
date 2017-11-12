<?php

namespace Drupal\trafficlight_api\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Device type entity.
 *
 * @ConfigEntityType(
 *   id = "device_type",
 *   label = @Translation("Device type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\trafficlight_api\DeviceTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\trafficlight_api\Form\DeviceTypeForm",
 *       "edit" = "Drupal\trafficlight_api\Form\DeviceTypeForm",
 *       "delete" = "Drupal\trafficlight_api\Form\DeviceTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\trafficlight_api\DeviceTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "device_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "device",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/device_type/{device_type}",
 *     "add-form" = "/admin/structure/device_type/add",
 *     "edit-form" = "/admin/structure/device_type/{device_type}/edit",
 *     "delete-form" = "/admin/structure/device_type/{device_type}/delete",
 *     "collection" = "/admin/structure/device_type"
 *   }
 * )
 */
class DeviceType extends ConfigEntityBundleBase implements DeviceTypeInterface {

  /**
   * The Device type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Device type label.
   *
   * @var string
   */
  protected $label;

}
