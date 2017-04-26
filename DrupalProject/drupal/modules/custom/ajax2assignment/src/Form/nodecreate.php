<?php

/*@file 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$body=drush_prompt("Enter the body text.");
$node=new stdClass();
$node->type='article';
node_object_prepare($node);
$node->title="Node Created Successfully";
$node->language=LANGUAGE;
        
