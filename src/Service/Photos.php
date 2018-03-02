<?php
/**
 * @file
 * Contains Drupal\flickr\Photos.
 */

namespace Drupal\flickr\Service;

use Drupal\flickr\Service\FlickrClient;

/**
 * Service class for Flickr Photos.
 */
class Photos {

  /**
   * @var \Drupal\flickr\Service\FlickrClient
   */
  protected $client;

  /**
   * Constructor for the 500px Photos class.
   */
  public function __construct(FlickrClient $client) {
    // Flickr Client
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
  public function flickrPhotosGetInfo($photo_id) {
    $response = $this->client->flickrRequest(
      'flickr.photos.getInfo',
      ['photo_id' => $photo_id]
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
  public function flickrPhotosGetSizes($photo_id) {
    $response = $this->client->flickrRequest(
      'flickr.photos.getSizes',
      ['photo_id' => $photo_id]
    );

    if ($response) {
      return $response['sizes']['size'];
    }

    return FALSE;
  }
}
