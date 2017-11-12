<?php

/**
 * @file
 * Contains queue_length.page.inc.
 *
 * Page callback for Queue length entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Queue length templates.
 *
 * Default template: queue_length.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_queue_length(array &$variables) {
  // Fetch QueueLength Entity Object.
  $queue_length = $variables['elements']['#queue_length'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
