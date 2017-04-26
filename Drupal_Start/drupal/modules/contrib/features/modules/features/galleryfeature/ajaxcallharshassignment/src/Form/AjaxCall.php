<?php

/* @file
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Drupal\ajaxcallharshassignment\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Form\ConfigFormBase;
use \Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\drupal_set_message;
use \Drupal\Core\Ajax\HtmlCommand;
use \Drupal\Core\Ajax\CssCommand;
class AjaxCall extends ConfigFormBase{
/**
  *{@inheritdoc}
  */
     protected function getEditableConfigNames() {
        return ['AjaxCall.edit'];
    }
/**
  *{@inheritdoc}
  */
    public function getFormId() {
        return 'AjaxCall';
    }
/**
  *{@inheritdoc}
  */
    public function buildForm(array $form, FormStateInterface $form_state) {
     $form['user_name']=[
         '#type'=>'textfield',
         '#title' => 'User Name',
         'description' => 'Enter the user name',
         '#suffix' => '<span class="email-valid-message"></span>',
         'size' => 60,
         '#ajax' => [
             'callback' =>'Drupal\ajaxcallharshassignment\Form\AjaxCall::validational',
             'event' => 'blur',
             ],
     ];
     return $form;
    }
/**
  *{@inheritdoc}
  */
    
    public function validational(array $form,  $form_state){
        $response = new AjaxResponse();
        if(!preg_match('/^[a-zA-Z ]+$/', $form_state->getValue('user_name'))){
        $text='Enter the correct user name';
                $css=['color' => 'red']; 
        $response->addCommand(new HtmlCommand('.email-valid-message',$text));
         $response->addCommand(new CssCommand('.email-valid-message',$css));
           }
           else{
               
         $text='';
                $css=['color' => 'black']; 
        $response->addCommand(new HtmlCommand('.email-valid-message',$text));
         $response->addCommand(new CssCommand('.email-valid-message',$css));
         
           }
       
         return $response;
        
        }
/**
  *{@inheritdoc}
  */

    public function submitForm(array &$form, FormStateInterface $form_state){
          drupal_set_message("Hello");
    }


    
}