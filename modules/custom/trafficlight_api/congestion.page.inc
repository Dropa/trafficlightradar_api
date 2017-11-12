<?php

/**
 * @file
 * Contains congestion.page.inc.
 *
 * Page callback for Congestion entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Congestion templates.
 *
 * Default template: congestion.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_congestion(array &$variables) {
  // Fetch Congestion Entity Object.
  $congestion = $variables['elements']['#congestion'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
