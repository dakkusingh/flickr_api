<?php

namespace Drupal\flickr_api\Service;

/**
 * Service class for Flickr API Tags.
 */
class Tags {

  /**
   * @var \Drupal\flickr_api\Service\Client
   */
  protected $client;

  /**
   * Constructor for the Flickr API Tags class.
   */
  public function __construct(Client $client) {
    // Flickr API Client.
    $this->client = $client;
  }

}
