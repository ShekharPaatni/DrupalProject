<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\addfield\Form;

use Drupal\Core\Form\ConfigFormBase;
use \Drupal\Core\Form\FormStateInterface;
class AddTextField extends ConfigFormBase{
  /**
   * 
   * @return type
   */
  
  protected function getEditableConfigNames() {
    return [
      'fieldadd.edit'
    ];
  }
/**
 * 
 * @return string
 */
  public function getFormId() {
    return 'Add Field';
  }
  /**
   * {@inheritdoc}
   * @param array $form
   * @param FormStateInterface $form_state
   * @return string
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    //parent::buildForm($form, $form_state);
    $form=[];
    $form['AddField']=[
      
      '#type' => 'button',
      '#value' =>$this->t('save'),
      '#ajax' =>[
        'wrapper' =>'newfield',
        'callback' => '::addfieldnew',
        'type' => 'click'
        ]
        
      
    ];
    $form['personal information']['button']=[
      '#type' => 'button',
      '#value' => $this->t('update')
    ];
    return $form;
  }
  public function addfieldnew(array $form, FormStateInterface $form_state){
    
  }
  
  }
  