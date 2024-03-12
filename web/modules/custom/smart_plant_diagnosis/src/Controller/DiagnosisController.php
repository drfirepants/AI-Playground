<?php

namespace Drupal\smart_plant_diagnosis\Controller;

use Drupal\Core\Controller\ControllerBase;

class DiagnosisController extends ControllerBase {
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Welcome to Smart Plant Diagnosis!'),
    ];
  }
}
