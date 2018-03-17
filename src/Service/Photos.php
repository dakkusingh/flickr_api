<?php

namespace Drupal\flickr_api\Service;

/**
 * Service class for Flickr API Photos.
 */
class Photos {

  /**
   * @var \Drupal\flickr_api\Service\Client
   */
  protected $client;

  /**
   * Constructor for the Flickr API Photos class.
   */
  public function __construct(Client $client) {
    // Flickr API Client.
    $this->client = $client;
  }

  /**
   * Get information about a photo.
   *
   * @param string $photo_id
   *   ID of the photo to get info about.
   *
   * @return array
   *   Response from the flickr method flickr.photos.getInfo..
   *   (https://www.flickr.com/services/api/flickr.photos.getInfo.html)
   */
  public function photosGetInfo($photo_id) {
    $args = ['photo_id' => $photo_id];

    $response = $this->client->request(
      'flickr.photos.getInfo',
      $args
    );

    if ($response) {
      return $response['photo'];
    }

    return FALSE;
  }

  /**
   * Returns the available sizes for a photo.
   *
   * @param string $photo_id
   *   ID of the photo to get the available sizes of.
   *
   * @return array
   *   Response from the flickr method flickr.photos.getSizes..
   *   (https://www.flickr.com/services/api/flickr.photos.getSizes.html)
   */
  public function photosGetSizes($photo_id) {
    $args = ['photo_id' => $photo_id];

    $response = $this->client->request(
      'flickr.photos.getSizes',
      $args
    );

    if ($response) {
      return $response['sizes']['size'];
    }

    return FALSE;
  }

  /**
   * Return a list of photos matching some criteria.
   *
   * @param string $nsid
   *   NSID of the user whose photoset tags will be returned.
   * @param string $page
   *   Page of results to return.
   *
   * @return array
   *   Response from the flickr method flickr.photos.search.
   *   (https://www.flickr.com/services/api/flickr.photos.search.html)
   */
  public function photosSearch($nsid, $page = 1, $other_args = []) {
    $args = [
      'page' => $page,
      'user_id' => $nsid,
    ];

    $args = array_merge($args, $other_args);

    // Set per_page to flickr_api module default if not specified in $args.
    if (!isset($args['per_page'])) {
      // TODO Expose pager as a setting.
      $args['per_page'] = 6;
    }

    $response = $this->client->request(
      'flickr.photos.search',
      $args
    );

    if ($response) {
      return $response['photos'];
    }

    return FALSE;
  }

}
