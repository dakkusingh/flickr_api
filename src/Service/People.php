<?php

namespace Drupal\flickr_api\Service;

/**
 * Service class for Flickr API People.
 */
class People {

  /**
   * @var \Drupal\flickr_api\Service\Client
   */
  protected $client;

  /**
   * Constructor for the Flickr API People class.
   */
  public function __construct(Client $client) {
    // Flickr API Client.
    $this->client = $client;
  }

}
