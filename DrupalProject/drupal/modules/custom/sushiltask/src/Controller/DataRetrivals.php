<?php

/**
 * @file
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Drupal\sushiltask\Controller;

class DataRetrivals{
    
    public function retrival(){
        
        $con= \Drupal::database();
        
        $data=$con->select('sushilform','a')
                  ->fields('a',['id','username','gender','phone','email','address','city'])
                  ->execute()->fetchAll();
                  return [
                      '#theme' => 'hello',
                      '#data' => $data
                  ];
        }

}
