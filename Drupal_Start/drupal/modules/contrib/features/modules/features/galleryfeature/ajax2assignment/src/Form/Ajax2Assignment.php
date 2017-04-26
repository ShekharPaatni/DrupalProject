<?php

/**
 * @file 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\ajax2assignment\Form;

use \Drupal\Core\Form\ConfigFormBase;
use \Drupal\Core\Form\FormStateInterface;
use \Drupal\Core\Form\drupal_set_message;
use \Drupal\Core\Url;
use \Drupal\Core\Ajax\AjaxResponse;
use \Drupal\Core\Ajax\HtmlCommand;
use \Drupal\Core\Ajax\CssCommand;
class Ajax2Assignment extends ConfigFormBase{
    
    protected function getEditableConfigNames() {
        return['ajax2assignment.edit'];
    }

    public function getFormId() {
        return 'ajax_form';
    }
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['Title']=[
            
            '#type' => 'select',
            '#title' => $this->t('Title'),
            '#options' =>['Mr.' => 'Mr.', 'Mrs' => 'Mrs'],
            
        ];
        $form['name']=[
          '#type' => 'textfield',
          '#title' => $this->t('Name'),
          '#size' => 60,
          '#maxlength' => 128,
          '#required' => TRUE,
          '#ajax' => [
            'callback' =>'::validateName',
          'event' => 'change'
           ],
           '#suffix' => '<span class="namecheck"></span>', 
        ];
        $form['email']=[
            '#type' => 'email',
            '#title' => $this->t('Email'),
            '#size' => 60,
            '#maxlength' => 254,
            '#ajax' =>[
            'callback' => '::emailvalidator',    
            'event' => 'change'
             ],
            '#suffix' => '<span class="emailcheck"></span>',
            '#required' => TRUE
        ];
         $form['Address']=[
          '#type'=> 'textarea',
          '#title' => $this->t('Address'),
          '#maxlength' => 300,
          '#required'  => TRUE,
          '#cols' => 10,
          '#rows' => 2
        ];
        $form['DOB']=[
            '#type' => 'datetime',
            '#title' => $this->t('Date Of Birth'),
            '#required' => TRUE,
            '#size' => 59,
            '#date_date_element' => 'date',
            '#date_time_element' => 'none',
            '#date_year_range' => '1950:1999',
            '#ajax' => [
                'callback'=> '::dobchecker',
            'event' => 'change'    
                ],
            '#suffix' => '<span class="dobcheck"></span>',
            
        ];
        
        $form['country']=[
            '#type' => 'select',
            '#title' => $this->t('Country'),
            '#options' => ['India' => 'India','Pakistan'=>'Pakistan','USA'=>'USA'],
            '#required' =>TRUE
        ];
        $form['state']=[
            '#type' =>'select',
            '#title' => $this->t('State'),
            '#options' =>[],
            
        ];
        
        $form['city']=[
            '#type' =>'select',
            '#title' => $this->t('City'),
            '#options' =>[],
            
        ];
        $form['Pincode']=[
            '#type' => 'number',
            '#title' => 'Pin Code',
            
            '#required' => TRUE
        ];
        $form['contactnumber']=[
          '#type' =>'tel',
          '#title' => $this->t('Phone Number'),
          '#size' => 30,
            '#required' => TRUE,
          '#maxlength' => 12  
        ];
        $form['gender']=[
            '#type' => 'radios',
            '#title' => $this->t('Gender'),
            '#options'=>['Male'=>'Male','Female'=>'Female'],
            
        ];
        $form['hobbies']=[
          '#type' => 'checkboxes',
          '#title' => $this->t('Hobbies'),
          '#options' =>[
              'Cricket' => 'Cricket',
              'Hockey' => 'Hockey',
              'Football' => 'Football',
              'Horse Riding' => 'Horse Riding',
          ]  
        ];
        $form['actions']=[
            '#type' => 'actions'
        ];
        $form['actions']['submit']=[
            '#type' => 'submit',
            '#value' => $this->t('Submit')
        ];
        $form['actions']['reset']=[
            '#type'=> 'submit',
            '#value' => $this->t('Reset')
        ];
                
        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        drupal_set_message("hello");
    }
    public function validateName(array &$form, FormStateInterface $form_state){
       
        $response=new AjaxResponse();
      if(!preg_match('/^[a-zA-Z ]+$/', $form_state->getValue('name'))){
          $border_color=['border-color'=> 'Red'];
          $message=$this->t("Enter the correct name");
          $css=['color'=>'red'];
          $response->addCommand(new HtmlCommand('.namecheck',$message));
          $response->addCommand(new CssCommand('.namecheck',$css));
          $response->addCommand(new CssCommand('#edit-name',$border_color));
    
          }else{
              $border_color=['border-color'=> 'Green'];
          $message=$this->t("Verified");
          $css=['color'=>'Green'];
           $response->addCommand(new HtmlCommand('.namecheck',$message));
          $response->addCommand(new CssCommand('.namecheck',$css));
          $response->addCommand(new CssCommand('#edit-name',$border_color));
    
          
          }
         
          return $response;
          }
    public function emailvalidator(array &$form, FormStateInterface $form_state){
        $response=new AjaxResponse();
        if(!preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]{2,4}$/', $form_state->getValue('email')))
        {
          $border_color=['border-color'=> 'Red'];
          $message=$this->t("Enter the correct email address");
          $css=['color'=>'red'];
          $response->addCommand(new HtmlCommand('.emailcheck',$message));
          $response->addCommand(new CssCommand('.emailcheck',$css));
          $response->addCommand(new CssCommand('#edit-email',$border_color));
      
        }else{
          $border_color=['border-color'=> 'Green'];
          $message=$this->t("Verified");
          $css=['color'=>'green'];
          $response->addCommand(new HtmlCommand('.emailcheck',$message));
          $response->addCommand(new CssCommand('.emailcheck',$css));
          $response->addCommand(new CssCommand('#edit-email',$border_color));
    
        }
        return $response;
                
    }
    public function dobchecker(array &$form, FormStateInterface $form_state){
        
        $response=new AjaxResponse();
        $dob= date_diff(date_create($form_state->getValue('DOB')), date_create('today'))->y;
        echo $dob;
        die;
        if($dob<18){
          $border_color=['border-color'=> 'Red'];
          $message=$this->t("You are under age");
          $css=['color'=>'red'];
          $response->addCommand(new HtmlCommand('.dobcheck',$message));
          $response->addCommand(new CssCommand('.dobcheck',$css));
          $response->addCommand(new CssCommand('#edit-DOB',$border_color));    
        }else{
          $border_color=['border-color'=> 'Green'];
          $message=$this->t("Verified");
          $css=['color'=>'Green'];
          $response->addCommand(new HtmlCommand('.dobcheck',$message));
          $response->addCommand(new CssCommand('.dobcheck',$css));
          $response->addCommand(new CssCommand('#edit-DOB',$border_color));    
        
        }
        return $response;
    }
            
}

