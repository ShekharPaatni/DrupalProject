<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Custom form
 *
 * @author chandra
 */
namespace Drupal\sushiltask\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class Customform extends ConfigFormBase{
/**
  *{@inheritdoc}
  */    
    protected function getEditableConfigNames() {
        return ['sushiltask.edit'];
    }
/**
  *{@inheritdoc}
  */
    public function getFormId() {
        return 'form_custom_detail';
    }
/**
  *{@inheritdoc}
  */    
    public function buildForm(array $form, FormStateInterface $form_state){
        $config=$this->config('sushiltask.edit'); 
        $form['username']=[
         '#type' =>'textfield',
         '#title' => $this->t('Full Name'),
         '#default_value' => $config->get('username'),
         '#size' => 60,
         '#maxlength' => 128,
         '#required' => TRUE   
        ];
        $form['gender']=[
          '#type' => 'radios',
          '#title' =>$this->t('Gender'),
          '#default_value' => $config->get('gender'),
          '#options' => ['Male'=> $this->t('Male'),
                         'Female'=> $this->t('Female')],
          '#required' => TRUE  
        ];
        $form['phone']=[
          '#type' => 'tel',
          '#title' => $this->t('Contact Number'),
          '#default_value' => $config->get('phone'),  
          '#required' => TRUE
            
        ];
        $form['email']=[
          '#type' => 'email',
          '#title' => $this->t('Email'),
          '#default_value' => $config->get('email'),
            '#required' => TRUE,
            '#maxlength' => 256,
        ];
        $form['add']=[
          '#type' => 'textarea',
          '#title' => $this->t('Address'),
          '#default_value' => $config->get('add'),
          '#required' => TRUE
        ];
        $form['city']=[
          '#type' => 'select',
          '#title' => $this->t('City'),
          '#options' =>[
              'Delhi' => $this->t('Delhi'),
              'Uttarakhand' => $this->t('Uttarakhand'),
              'Punjab' => $this->t('Punjab')
          ],
            '#default_value' => $config->get('city'),
        ];
        
        $form['submit']=[
          '#type' => 'submit',
          '#value' => $this->t('Save')  
        ];
        return $form;
    }
/**
  *{@inheritdoc}
  */    
   public function validateForm(array &$form, FormStateInterface $form_state) {
    // Validation is optional.
    if(!preg_match('/[a-zA-Z ]+/', $form_state->getValue('username'))){
        $form_state->setErrorByName('username',t('Enter the correct user name'));
    }
    if(!preg_match('/[0-9]+/', $form_state->getValue('phone'))){
        $form_state->setErrorByName('phone',t('Enter the correct Number'));
    }
    
            
    }
/**
  *{@inheritdoc}
  */    
    public function submitForm(array &$form, FormStateInterface $form_state){
        $username=$form_state->getValue('username');
        $gender=$form_state->getValue('gender');
        $phone=$form_state->getValue('phone');
        $email=$form_state->getValue('email');
        $add=$form_state->getValue('add');
        $city=$form_state->getValue('city');
        $this->config('sushiltask.edit')->set('username',$username)->set('gender', $gender)->set('phone', $phone)->set('email', $email)
                ->set('add', $add)->set('city', $city)->save();
        $fields=[
            'username' => $username,
             'gender' => $gender,
                'phone' => $phone,
            'email' => $email,
              'address' => $add,
           'city' => $city,
        ];
        $conn=\Drupal::database(); 
        $exist= $conn->select('sushilform')->fields('sushilform')->condition('email',$email,'=')->execute()->fetchAll();
        if($exist){
        $conn->update('sushilform')->fields($fields)->condition('email',$email,'=')->execute();
        drupal_set_message("Data Updated Successfully");
        }else{
            $conn->insert('sushilform')->fields($fields)->execute();
            drupal_set_message("Data inserted successfully");
            
        }
    }
}


