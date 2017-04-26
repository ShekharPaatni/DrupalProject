<?php

/*@file
 *  
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\narendratask\Plugin\QueueWorker;
use \Drupal\Core\Queue\QueueWorkerBase;
use \Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use \Drupal\Core\Entity\EntityStorageInterface;
use Drupal\node\NodeInterface;
class NodePublish extends QueueWorkerBase implements ContainerFactoryPluginInterface{
  /**
   *
   * @var It will node information
   */
  protected $nodeStorage;
  /**
   * 
   * @param EntityStorageInterface $node
   */
  
  public function __construct(EntityStorageInterface $nodes) {
    $this->nodeStorage=$nodes;
     }
  /**
   * 
   * {@inheritdoc}
   */   
  public static function create(\Symfony\Component\DependencyInjection\ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $container->get('entity.manager')->getStorage('node')
    );
  }
 
  /**
   * 
   * {@inheritdoc}
   */
  
  public function processItem($data) {
  
  $node= $this->nodeStorage->load($data->nid);
  if(!$node->isPublished() && $node instanceof NodeInterface && $node->isNew())
  {
    return $this->processNode($node);
  } 
  }
/**
 * 
 * @param NodeInterface $node
 * @return int 
 * 
 */
  protected function processNode($node){
  $node->setPublished(TRUE);
  return $node->save();  
  }
    
}