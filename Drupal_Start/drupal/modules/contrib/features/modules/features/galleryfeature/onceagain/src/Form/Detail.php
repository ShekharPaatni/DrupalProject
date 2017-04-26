<?php

/** 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\onceagain\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use \Symfony\Component\DependencyInjection\ContainerInterface;
use \Drupal\Core\Session\AccountInterface;

class Detail extends ConfigFormBase{
    protected $account;
    /**
  *{@inheritdoc}
  */
    public function __construct(AccountInterface $account){
    $this->account=$account;
    }  
/**
  *{@inheritdoc}
  */
 public static function create(ContainerInterface $container) {
     return new static(
             $container->get('current_user')
     );}

 /**
  *{@inheritdoc}
  */
    public function getFormId(){
         return 'custom_form';
    }   
/**
  *{@inheritdoc}
  */
    
    public function buildForm(array $form, FormStateInterface $form_state){
       $config=$this->config('onceagain.edit');
            
       $user=$this->account->getAccount()->getEmail();
       $form['label']=[
         '#type' => 'textfield',
         '#title' => $this->t('Current User Email Address'),
         '#default_value' => $user,
          '#required' => TRUE, 
         '#disabled' => TRUE
       ];
       $form['name']=[
           '#type' => 'textfield',
           '#title' => $this->t('Name'),
           '#size' => 60,
           '#maxlength' => 100,
           '#required' => TRUE,
           '#default_value' => $config->get('name')
            ];
       $form['gender']=[
           '#type' =>'radios',
           '#title' => $this->t('Gender'),
           '#maxlength' => 1,
           '#options' => [0=>$this->t('Male'),1=>$this->t('Female')],
           '#default_value' => $config->get('gender'),
           '#required' => TRUE
       ];
       $form['country']=[
           '#type' => 'select',
           '#title' => $this->t('Country'),
           '#options' => [
               1 => 'India',
               2 => 'Australia',
               3 => 'China',
               4 => 'Japan',
               5 => 'USA'
           ],
           '#default_value' => $config->get('country'),
           
       ];
       $form['description']=[
         '#type' => 'textarea',
         '#title' => $this->t('Description'),
         '#default_value' => $config->get('description'),
         '#required' => TRUE
       ];
       $form['condition']=[
           '#type' => 'checkbox',
           '#title' => $this -> t('I agree all the terms and conditions.'),
           '#default_value' => $config->get('condition'),
           '#required' => TRUE
               ];
       $form['actions']['submit']=[
           '#type' => 'submit',
           '#value' => $this->t('Submit')
       ];
        return $form;
    }
/**
  *{@inheritdoc}
  */
 
   public function submitForm(array &$form, FormStateInterface $form_state){
          
       $name=$form_state->getValue('name');
       $gender=$form_state->getValue('gender');
       $country=$form_state->getValue('country');
       $desc=$form_state->getValue('description');
       $checked=$form_state->getValue('condition');
       $this->config('onceagain.edit')->set('name',$name)->set('gender',$gender)
               ->set('country',$country)->set('description',$desc)->set('condition',$checked)->save();
//       $fields=[
//           'name'=> $name,
//           'gender' => $gender,
//           'country' => $country,
//           'Description' => $desc
//       ];
//       db_insert('customform')->fields($fields)->execute();
//       
   drupal_set_message($this->t("Role theme configuration saved succefully"));
        
    }
/**
  *{@inheritdoc}
  */
    protected function getEditableConfigNames() {
    return ['onceagain.edit'];
    }

}