<?php

namespace Drupal\flickr_api\Service;

/**
 * Service class for Flickr API Helpers.
 */
class Helpers {

  /**
   * @var \Drupal\flickr_api\Service\Client
   */
  protected $client;

  /**
   * Constructor for the Flickr API Helpers class.
   */
  public function __construct(Client $client) {
    // Flickr API Client.
    $this->client = $client;
  }

  /**
   * Flickr is NSID.
   */
  public function isNsid($id) {
    return preg_match('/^\d+@N\d+$/', $id);
  }

}
