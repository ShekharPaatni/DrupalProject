<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\manishtask\Controller;

use Drupal\Core\Controller\ControllerBase;

class ControlContent extends ControllerBase{
    public function content(){
        return array(
            '#type'=>'markup',
            '#markup'=>t("hello Manish"),
        );
    }
}
