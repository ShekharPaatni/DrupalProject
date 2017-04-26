<?php

/**
 * @file 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use \Drupal\node\Entity\Node;

function emaillist_drush_command(){
  $items;
  $items['listed-display']=[
    'description' =>'It will print the email address',
    'arguments' => [
        'name' => 'It will show your email address',
    ],
    'drupal dependencies' => ['ajax2assignment'],
    'aliases' => ['listed:display']  
  ];
  $items['node-creation']=[
    'description' => 'It will create a node with using drush',
    'arguments' => [],
      'drupal dependencies' => ['ajax2assignment'],
    'aliases' => ['node:creation']
  ];
  return $items;  
  
    
}
function drush_emaillist_node_creation(){
  //$uid= \Drupal::service('current_user')->id();
  $uid= \Drupal::currentUser()->id();
  drush_print($uid);
  $title=drush_prompt("Enter the title:-\n");
  $body=drush_prompt("Enter the body");
  $node=Node::create([
    'type' => 'article',
    'title' => $title,
    'body' => [
      'value' => $body,
      'format' => 'basic_html',
    ],
    'uid' => '1'
    ]);
  $node->save();
}
function drush_emaillist_listed_display(){
    $conn=\Drupal::database();
    $result=$conn->select('users_field_data','u')
         ->fields('u',['mail'])
         ->execute()->fetchAll();
//    $arr= json_decode(json_encode($result),TRUE);
  drush_print(); 
    foreach($result as $row){
     $obj=(array)$row;
     if($obj['mail']!=NULL)
      drush_print($obj['mail']."\n");
    }
 
}
