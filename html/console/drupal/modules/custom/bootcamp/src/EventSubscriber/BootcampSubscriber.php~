<?php

namespace Drupal\bootcamp\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class BootcampSubscriber.
 *
 * @package Drupal\bootcamp
 */
class BootcampSubscriber implements EventSubscriberInterface {


  /**
   * Constructor.
   */
  public function __construct() {

  }

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events['config.save'] = ['bootcamp_config_save'];

    return $events;
  }

  /**
   * This method is called whenever the config.save event is
   * dispatched.
   *
   * @param GetResponseEvent $event
   */
  public function bootcamp_config_save(Event $event) {
    drupal_set_message('Event config.save thrown by Subscriber in module bootcamp.', 'error', TRUE);
  }

}
