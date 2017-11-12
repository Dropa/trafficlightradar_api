<?php

namespace Drupal\trafficlight_api\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Detector type entity.
 *
 * @ConfigEntityType(
 *   id = "detector_type",
 *   label = @Translation("Detector type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\trafficlight_api\DetectorTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\trafficlight_api\Form\DetectorTypeForm",
 *       "edit" = "Drupal\trafficlight_api\Form\DetectorTypeForm",
 *       "delete" = "Drupal\trafficlight_api\Form\DetectorTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\trafficlight_api\DetectorTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "detector_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "detector",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/detector_type/{detector_type}",
 *     "add-form" = "/admin/structure/detector_type/add",
 *     "edit-form" = "/admin/structure/detector_type/{detector_type}/edit",
 *     "delete-form" = "/admin/structure/detector_type/{detector_type}/delete",
 *     "collection" = "/admin/structure/detector_type"
 *   }
 * )
 */
class DetectorType extends ConfigEntityBundleBase implements DetectorTypeInterface {

  /**
   * The Detector type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Detector type label.
   *
   * @var string
   */
  protected $label;

}
