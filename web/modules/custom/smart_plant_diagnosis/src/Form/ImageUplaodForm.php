<?php

namespace Drupal\smart_plant_diagnosis\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;

class ImageUploadForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'smart_plant_diagnosis_image_upload_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['description'] = [
      '#type' => 'item',
      '#markup' => $this->t('Upload an image of your plant for diagnosis.'),
    ];

    $form['image_upload'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Image'),
      '#upload_location' => 'public://plant_diagnosis_images/',
      '#required' => TRUE,
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
      ],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Diagnose Plant'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // todo: Add custom validation logic.
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $image = $form_state->getValue('image_upload');
    $file = File::load($image[0]);
    $file->setPermanent();
    $file->save();

    // todo: Add logic here to process the uploaded image with AI model.

    drupal_set_message($this->t('Image uploaded successfully and is being processed.'));
  }

}
