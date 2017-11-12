<?php

/**
 * @file
 * Contains detector.page.inc.
 *
 * Page callback for Detector entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Detector templates.
 *
 * Default template: detector.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_detector(array &$variables) {
  // Fetch Detector Entity Object.
  $detector = $variables['elements']['#detector'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
