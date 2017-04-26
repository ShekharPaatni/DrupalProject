<?php

namespace Drupal\bootcamp\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class BootcampForm.
 *
 * @package Drupal\bootcamp\Form
 */
class BootcampForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'bootcamp.bootcamp',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'bootcamp_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('bootcamp.bootcamp');
    $form['key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Key'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('key'),
    ];
    $form['date'] = [
      '#type' => 'date',
      '#title' => $this->t('Date'),
      '#default_value' => $config->get('date'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('bootcamp.bootcamp')
      ->set('key', $form_state->getValue('key'))
      ->set('date', $form_state->getValue('date'))
      ->save();
  }

}
