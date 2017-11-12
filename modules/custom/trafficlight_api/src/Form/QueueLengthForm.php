<?php

namespace Drupal\trafficlight_api\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Queue length edit forms.
 *
 * @ingroup trafficlight_api
 */
class QueueLengthForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\trafficlight_api\Entity\QueueLength */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = &$this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Queue length.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Queue length.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.queue_length.canonical', ['queue_length' => $entity->id()]);
  }

}
