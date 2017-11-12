<?php

/**
 * @file
 * Contains device.page.inc.
 *
 * Page callback for Device entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Device templates.
 *
 * Default template: device.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_device(array &$variables) {
  // Fetch Device Entity Object.
  $device = $variables['elements']['#device'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
