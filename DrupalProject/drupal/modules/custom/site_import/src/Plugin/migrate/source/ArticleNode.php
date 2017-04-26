<?php

namespace Drupal\site_import\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;
use Drupal\migrate\Event\MigrateImportEvent;

/**
 * Source plugin for article content.
 *
 * @MigrateSource(
 *   id = "article_node"
 * )
 */
class ArticleNode extends SqlBase {

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
