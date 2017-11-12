<?php

/**
 * @file
 * Contains traffic_amount.page.inc.
 *
 * Page callback for Traffic amount entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Traffic amount templates.
 *
 * Default template: traffic_amount.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_traffic_amount(array &$variables) {
  // Fetch TrafficAmount Entity Object.
  $traffic_amount = $variables['elements']['#traffic_amount'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
