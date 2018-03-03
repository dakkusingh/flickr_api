<?php

namespace Drupal\flickr_api\Service;

/**
 * Service class for Flickr API Favorites.
 */
class Favorites {

  /**
   * @var \Drupal\flickr_api\Service\Client
   */
  protected $client;

  /**
   * Constructor for the Flickr API Favorites class.
   */
  public function __construct(Client $client) {
    // Flickr API Client.
    $this->client = $client;
  }

  /**
   * Returns a list of favorite public photos for the given user.
   *
   * @param string $nsid
   *   NSID of the user whose photoset tags will be returned.
   * @param string $page
   *   Page of results to return.
   *
   * @return array
   *   Response from the flickr method flickr.favorites.getPublicList.
   *   (https://www.flickr.com/services/api/flickr.favorites.getPublicList.html)
   */
  public function favoritesGetPublicList($nsid, $page = 1, $other_args = []) {
    $args = [
      'user_id' => $nsid,
      'page' => $page,
    ];

    array_merge($args, $other_args);

    // Set per_page to flickr_api module default if not specified in $args.
    if (!isset($args['per_page'])) {
      // TODO Expose pager as a setting.
      $args['per_page'] = 6;
    }

    $response = $this->client->request(
      'flickr.favorites.getPublicList',
      $args
    );

    if ($response) {
      return $response['photos'];
    }

    return FALSE;
  }

}
