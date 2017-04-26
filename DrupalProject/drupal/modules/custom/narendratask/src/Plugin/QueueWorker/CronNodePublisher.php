<?php

/* 
 * @QueueWorker(
 * id='cron_node_publisher',
 * title='@Translation("Cron Node Publisher"),
 * cron={"time" = 5}
 * )
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use \Drupal\narendratask\Plugin\QueueWorker\NodePublish;
class CronNodePublisher extends NodePublish{
  
}
