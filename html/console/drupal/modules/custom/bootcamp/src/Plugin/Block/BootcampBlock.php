<?php

namespace Drupal\bootcamp\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'BootcampBlock' block.
 *
 * @Block(
 *  id = "bootcamp_block",
 *  admin_label = @Translation("Bootcamp block"),
 * )
 */
class BootcampBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
         'info' => $this->t(''),
        ] + parent::defaultConfiguration();

 }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['info'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Info'),
      '#description' => $this->t(''),
      '#default_value' => $this->configuration['info'],
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['info'] = $form_state->getValue('info');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['bootcamp_block_info']['#markup'] = '<p>' . $this->configuration['info'] . '</p>';

    return $build;
  }

}
