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

  /**
   * Get information about a user.
   *
   * @param string $nsid
   *   The Flickr user's NSID.
   *
   * @return array $response
   *   Array with person's info from flickr.people.getInfo.
   *   (https://www.flickr.com/services/api/flickr.people.getInfo.html)
   *   or FALSE on error.
   */
  function peopleGetInfo($nsid) {
    $args = [
      'user_id' => $nsid
    ];

    $response = $this->client->request(
      'flickr.people.getInfo',
      $args
    );

    if ($response) {
      return $response['person'];
    }

    return FALSE;
  }

  /**
   * Return a user's NSID, given their username.
   *
   * @param string $username
   *   Username to look for.
   *
   * @return array
   *   Response from the flickr method flickr.people.findByUsername.
   *   (https://www.flickr.com/services/api/flickr.people.findByUsername.html)
   */
  function peopleFindByUsername($username) {
    $args = [
      'username' => $username
    ];

    $response = $this->client->request(
      'flickr.people.findByUsername',
      $args
    );

    if ($response) {
      return $response['user'];
    }

    return FALSE;
  }

  /**
   * Return a user's NSID, given their alias.
   *
   * @param string $alias
   *   Username to look for.
   *
   * @return array
   *   Response from the flickr method flickr.people.findByUsername.
   *   (https://www.flickr.com/services/api/flickr.people.findByUsername.html)
   */
  function peopleFindByAlias($alias) {
    $args = [
      'url' => 'https://www.flickr.com/photos/' . $alias
    ];

    $response = $this->client->request(
      'flickr.people.findByUsername',
      $args
    );

    if ($response && $response['stat'] == 'ok') {
      return $response['user'];
    }

    return FALSE;
  }

  /**
   * Return a user's NSID, given their email address.
   *
   * @param string $email
   *   Email to look for.
   *
   * @return array
   *   Response from the flickr method flickr.people.findByEmail.
   *   (https://www.flickr.com/services/api/flickr.people.findByEmail.html)
   */
  function peopleFindByEmail($email) {
    $args = [
      'find_email' => $email
    ];

    $response = $this->client->request(
      'flickr.people.findByEmail',
      $args
    );

    if ($response) {
      return $response['user'];
    }

    return FALSE;
  }

  /**
   * Returns a list of public photos for the given user.
   *
   * @param string $nsid
   *   NSID of the user whose photos you want.
   *
   * @return array $response
   *   Response from the flickr method flickr.people.getPublicPhotos.
   *   (https://www.flickr.com/services/api/flickr.people.getPublicPhotos.html)
   */
  function peopleGetPublicPhotos($nsid, $page = 1, $other_args = []) {
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
      'flickr.people.getPublicPhotos',
      $args
    );

    if ($response) {
      return $response['photos'];
    }

    return FALSE;
  }

}
