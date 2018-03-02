<?php

namespace Drupal\flickr_api\Service;

/**
 * Service class for Flickr API Groups.
 */
class Groups {

  /**
   * @var \Drupal\flickr_api\Service\Client
   */
  protected $client;

  /**
   * Constructor for the Flickr API Groups class.
   */
  public function __construct(Client $client) {
    // Flickr API Client.
    $this->client = $client;
  }

}
