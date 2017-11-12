<?php

namespace Drupal\trafficlight_api\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Traffic amount edit forms.
 *
 * @ingroup trafficlight_api
 */
class TrafficAmountForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\trafficlight_api\Entity\TrafficAmount */
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
        drupal_set_message($this->t('Created the %label Traffic amount.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Traffic amount.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.traffic_amount.canonical', ['traffic_amount' => $entity->id()]);
  }

}
