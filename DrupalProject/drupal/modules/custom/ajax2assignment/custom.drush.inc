<?php

/**
 * @file 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
function custom_drush_command(){
    global $items;
    $items['say-hello'] = [
   'description' => 'Echo the name you type with Say hello command',
   'arguments' => [
     'name' => 'The name for saying hello',
   ],
   'drupal dependencies' => ['ajax2assignment'],
   'aliases' => ['say:hello'],
 ];
//    $items['listed-display']=[
//    'description' =>'It will print the email address',
//    'arguments' => [
//        'name' => 'It will show your email address',
//    ],
//    'drupal dependencies' => ['ajax2assignment'],
//    'aliases' => ['listed:display']  
//  ];
 return $items;
}
//function drush_custom_listed_display(){
//
//drush_print("Email Address");    
//
//}
function drush_custom_say_hello($name){
  print_r($GLOBALS['items']['say-hello']['arguments']['name']."\n");
 drush_print("Hello I am shekhar");
 $option=drush_prompt('Do You want to continue(Y/N)?',NULL,false);
 drush_print($option);
 $select=['1' => 'Cow', '2' => 'Goat'];
 $choice=drush_choice($select,"Select any option");
 drush_print($choice);
 drush_print(t("You have Entered the @choice",['@choice'=>$select[$choice]]));
 
}
