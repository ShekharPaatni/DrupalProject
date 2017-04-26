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
use Drupal\Core\Ajax\ReplaceCommand;
use \Drupal\Core\Ajax\CssCommand;
class Ajax2Assignment extends ConfigFormBase{
    public $gender;
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
          'event' => 'change',
          'progress' =>[
              'type' =>'throbber',
              'message' => 'Checking Name',
          ],    
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
            '#type' => 'date',
            '#title' => $this->t('Date Of Birth'),
            '#required' => TRUE,
            '#size' => 59,
            '#ajax' => [
            'callback'=> '::dobchecker',
              ], 
            '#suffix' => '<span class="dobcheck"></span>',
            
        ];
        
        $form['country']=[
            '#type' => 'select',
            '#title' => $this->t('Country'),
            '#options' => ['India' => 'India','Pakistan'=>'Pakistan','USA'=>'USA'],
            '#prefix' =>    '<div class="country-wise">',
            '#suffix' => '</div>',            
            '#required' => TRUE,
            '#validated' =>TRUE,
            
            '#ajax' =>[
             'callback' => '::countryCorsData',
             'event' => 'change',
             'wrapper' => 'tested',
             'progress'=>[
                  'type' =>'throbber',
                  'message' => 'Fetching States'  
                ]   
            ],
            
        ];
        
              
        
        $form['state']=[
            '#type' =>'select',
            '#title' => $this->t('State'),
            '#required' => TRUE,
            '#validated' =>TRUE,
            '#prefix' => '<div id="tested">',
            '#suffix' => '</div>',
            '#ajax'=>[
              'callback' => '::cityfetching',
                'event' => 'change',
                'wrapper' => 'citied',
                
                'progress'=>[
                  'type' =>'throbber',
                  'message' => 'Fetching Cities'  
                ]
            ]
        ];
        
        $form['city']=[
            '#type' =>'select',
            '#validated' =>TRUE,
            '#required' => TRUE,
            '#title' => $this->t('City'),
            '#prefix' => '<div id="citied">',
            '#suffix' => '</div>',
                        
        ];
        $form['pincode']=[
            '#type' => 'number',
            '#title' => 'Pin Code',
            '#placeholder' => t('Ex. 110003'),
            '#required' => TRUE,
            '#suffix' =>'<span class="PinChecker"></span>',
            '#ajax'=>[
                'callback' => '::pinCodeChecker',
                'event' =>'change',
            ],
        ];
        $form['contactnumber']=[
          '#type' =>'tel',
          '#title' => $this->t('Phone Number'),
          '#size' => 30,
          '#placeholder' => t('Ex. 9999999999'),
          '#suffix' => '<span class="ContactCheck"> </span>',
            
          '#required' => TRUE,
          '#ajax'=>[
              'callback' => '::contactNumber',
              'event' => 'change'
          ]
            
        ];
        $form['gender']=[
            '#type' => 'radios',
            '#title' => $this->t('Gender'),
            '#options'=>['Male'=>'Male','Female'=>'Female'],
            '#ajax'=>[
                'callback' => '::gendermatch',
                'event' => 'change',
                'progress'=>[
                  'type' =>'throbber',
                  'message' => 'Value Setting'  
                ],
              
            ],
            '#prefix' => '<div class="genderinfo">',
            '#suffix' => '</div>'
        ];
//        $form['change']=[
//          '#type'=> 'button',
//          '#value' => $this->t('Change'),
//          '#ajax' =>[
//              'callback' => '::genderchangeinfo',
//              'event' => 'click'
//          ]  
//                
//        ];
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
   
    public function pinCodeChecker(array &$form, FormStateInterface $form_state){
       $response=new AjaxResponse();
       if(strlen($form_state->getValue('pincode'))>3 && strlen($form_state->getValue('pincode'))<7 && preg_match('/^[0-9]+$/', $form_state->getValue('pincode'))){
           $border_color=['border-color'=> 'Green','color' => 'green'];
          $message=$this->t('Verified');
          $response->addCommand(new HtmlCommand('.PinChecker',$message));
           $response->addCommand(new CssCommand('.PinChecker',$border_color));
          $response->addCommand(new CssCommand('#edit-pincode',$border_color));
       }else{
           $border_color=['border-color'=> 'red','color' => 'red'];
          $message=$this->t('Pin number is not related to the particular country');
          $response->addCommand(new HtmlCommand('.PinChecker',$message));
          $response->addCommand(new CssCommand('.PinChecker',$border_color));
          $response->addCommand(new CssCommand('#edit-pincode',$border_color));
       }
       return $response;
    }
    public function genderchangeinfo(array &$form, FormStateInterface $form_state){
        $response=new AjaxResponse();
        $form_state->setRebuild(TRUE);
        $form['gender']=[
            '#type' => 'radios',
            '#title' => $this->t('Gender'),
            '#options'=>['Male'=>'Male','Female'=>'Female'],
            '#default_value'=>$gender,
            '#ajax'=>[
                'callback' => '::gendermatch',
                'event' => 'change',
                'progress'=>[
                  'type' =>'throbber',
                  'message' => 'Value Setting'  
                ],
              
            ],
            '#prefix' => '<div class="genderinfo">',
            '#suffix' => '</div>'
        ];
        $response->addCommand(new \Drupal\Core\Ajax\InsertCommand("#genderinfor",$form['gender']));
        return $response;
    }

    public function contactNumber(array &$form, FormStateInterface $form_state){
       $response=new AjaxResponse();
        if(strlen($form_state->getValue('contactnumber'))>9 && strlen($form_state->getValue('contactnumber'))<12 && preg_match('/^[0-9]+$/', $form_state->getValue('contactnumber'))){
          $border_color=['border-color'=> 'Green','color' => 'green'];
          $message=$this->t('Verified');
          $response->addCommand(new HtmlCommand('.ContactCheck',$message));
          $response->addCommand(new CssCommand('#edit-contactnumber',$border_color));
        }else{
         $border_color=['border-color'=> 'Red','color' => 'Red'];
          $message=$this->t('Enter the Correct Contact number');
          $response->addCommand(new HtmlCommand('.ContactCheck',$message));
          $response->addCommand(new CssCommand('#edit-contactnumber',$border_color));
     
        }
        return $response;
    }
    public function gendermatch(array &$form, FormStateInterface $form_state){
       $response=new AjaxResponse();
       $gender=$form_state->getValue('gender');
             //$response->addCommand(new CssCommand('.genderinfo','color->black'));
             $response->addCommand(new ReplaceCommand('.genderinfo',"<div id=\"genderinfor\"><b>Gender:</b> ".$form_state->getValue('gender')."</div>"));
             return $response;
             
    }
    public function submitForm(array &$form, FormStateInterface $form_state){
        
    kint($form_state->getValues());
    
        print_r($form_state->getValue('country')."***********".$form_state->getValue('state'));
        die;
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
              $conn=\Drupal::database();
              $exists=$conn->select('sushilform','sushil')
                   ->fields('sushil',['username'])
                   ->condition('username',$form_state->getValue('name'), '=')
                   ->execute()->fetchAll();
               if($exists){
              $border_color=['border-color'=> 'RED'];
          $message=$this->t("Already Registered");
          $css=['color'=>'RED'];
           $response->addCommand(new HtmlCommand('.namecheck',$message));
          $response->addCommand(new CssCommand('.namecheck',$css));
          $response->addCommand(new CssCommand('#edit-name',$border_color));
              }else{
                    $border_color=['border-color'=> 'Green'];
          $message=$this->t("User name available");
          $css=['color'=>'Green'];
           $response->addCommand(new HtmlCommand('.namecheck',$message));
          $response->addCommand(new CssCommand('.namecheck',$css));
          $response->addCommand(new CssCommand('#edit-name',$border_color));
                  
              }
          
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
    public function countryCorsData(array $form, FormStateInterface $form_state ){
        unset($form['state']['#options']);
        unset($form['city']['#options']);
        $response=new AjaxResponse();
        $conn=\Drupal::database();
        $query=$conn->select('country','c');
        $query->fields('s',['statename']);
        $query->join('state','s', 'c.id = s.cid');
        $query->condition('c.countryname',$form_state->getValue('country'), '=');
        $output=$query->execute();
        $array= json_decode(json_encode($output->fetchAll()),TRUE);
        $state[]=['-Select-'];;
        foreach ($array as $val){
            $state[$val['statename']]=$val['statename'];
        }
       $form_state->setRebuild(TRUE);
        $form['state']['#options']=$state;
        //It can also be worked with the same
        //$response->addCommand(new HtmlCommand('#tested',$form['state']),TRUE);
        return $form['state'];
    }   
    public function cityfetching(array &$form, FormStateInterface $form_state){
        unset($form['city']['#options']);
        $response=new AjaxResponse();
        $conn=\Drupal::database();
        $query=$conn->select('state','s');
        $query->fields('c',['cityname']);
        $query->join('city','c', 's.id = c.sid');
        $query->condition('s.statename',$form_state->getValue('state'), '=');
        $output=$query->execute();
        $array= json_decode(json_encode($output->fetchAll()),TRUE);
        
        $state[]=['-Select-'];
        foreach ($array as $val){
            $state[$val['cityname']]=$val['cityname'];
        }
         $form_state->setRebuild(TRUE);
        $form['city']['#options']=$state;
        $response->addCommand(new HtmlCommand('#citied',$form['city']),TRUE);
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

