<?php

namespace Drupal\flickr_api\Service;

/**
 * Service class for Flickr API Helpers.
 */
class Helpers {

  /**
   * Flickr is NSID.
   */
  public function isNsid($id) {
    return preg_match('/^\d+@N\d+$/', $id);
  }

  /**
   * A list of possible photo sizes with description and label.
   *
   * @return array
   *   An array of photo sizes.
   */
  public function photoSizes() {
    return [
      's' => [
        'label' => 'Square',
        'description' => t('s: 75 px square'),
      ],
      't' => [
        'label' => 'Thumbnail',
        'description' => t('t: 100px on longest side'),
      ],
      'q' => [
        'label' => 'Large Square',
        'description' => t('q: 150px square'),
      ],
      'm' => [
        'label' => 'Small',
        'description' => t('m: 240px on longest side'),
      ],
      'n' => [
        'label' => 'Small 320',
        'description' => t('n: 320px on longest side'),
      ],
      '-' => [
        'label' => 'Medium',
        'description' => t('-: 500px on longest side'),
      ],
      'z' => [
        'label' => 'Medium 640',
        'description' => t('z: 640px on longest side'),
      ],
      'c' => [
        'label' => 'Medium 800',
        'description' => t('c: 800px on longest side'),
      ],
      'b' => [
        'label' => 'Large',
        'description' => t('b: 1024px on longest side'),
      ],
      'h' => [
        'label' => 'Large 1600',
        'description' => t('h: 1600px on longest side'),
      ],
      'k' => [
        'label' => 'Large 2048',
        'description' => t('k: 2048px on longest side'),
      ],
      'o' => [
        'label' => 'Original',
        'description' => t('o: Original image'),
      ],
      'x' => [
        'label' => 'slideshow',
        'description' => t('x: Full featured responsive slideshow (for group, set and user IDs only)'),
      ],
      'y' => [
        'label' => 'Simple slideshow',
        'description' => t('y: Basic responsive slideshow (for set and user IDs only)'),
      ],
    ];
  }

}
