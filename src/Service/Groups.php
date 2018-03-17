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
  public function __construct(Client $client, Helpers $helpers) {
    // Flickr API Client.
    $this->client = $client;

    // Flickr API Helpers.
    $this->helpers = $helpers;
  }

  /**
   * Returns info about a given group.
   *
   * @param string $id
   *   NSID of the group whose photos you want.
   *
   * @return array
   *   Response from the flickr method flickr.groups.getInfo.
   *   (https://www.flickr.com/services/api/flickr.groups.getInfo.html)
   */
  public function groupsGetInfo($id, $other_args = []) {
    if ($this->helpers->isNsid($id)) {
      $args = ['group_id' => $id];
    }
    else {
      $args = ['group_path_alias' => $id];
    }

    $args = array_merge($args, $other_args);

    $response = $this->client->request(
      'flickr.groups.getInfo',
      $args
    );

    if ($response) {
      return $response['group'];
    }

    return FALSE;
  }

}
