<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\bootcamp\Plugin\migrate\source;
use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;
use Drupal\migrate\Event\MigrateImportEvent;

/**
 * Source plugin for article content.
 *
 * @MigrateSource(
 *   id = "node_article"
 * )
 */

class NodeArticle extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('article', 'a')
    ->fields('a');
    $query->addField('a','body','content');
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'id' => $this->t('Legacy ID'),
      'status' => $this->t('Published'),
      'title' => $this->t('Title'),
      'body' => $this->t('Description')
    ];

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'a',
      ],
    ];
  }

}
