<?php

namespace Drupal\trafficlight_api\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DetectorTypeForm.
 */
class DetectorTypeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $detector_type = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $detector_type->label(),
      '#description' => $this->t("Label for the Detector type."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $detector_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\trafficlight_api\Entity\DetectorType::load',
      ],
      '#disabled' => !$detector_type->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $detector_type = $this->entity;
    $status = $detector_type->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Detector type.', [
          '%label' => $detector_type->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Detector type.', [
          '%label' => $detector_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($detector_type->toUrl('collection'));
  }

}
