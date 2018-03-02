<?php

namespace Drupal\flickr_api\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Implements the Flickr API Settings form controller.
 *
 * @see \Drupal\Core\Form\FormBase
 */
class Settings extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'flickr_api_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'flickr_api.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('flickr_api.settings');

    $form['credentials'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('OAuth Settings'),
    ];

    $form['credentials']['help'] = [
      '#type' => '#markup',
      '#markup' => $this->t('API Key from Flickr. Get an API Key at @link.',
        [
          '@link' => Link::fromTextAndUrl('https://www.flickr.com/services/apps/create/apply',
          Url::fromUri('https://www.flickr.com/services/apps/create/apply'))->toString(),
        ]
      ),
    ];

    $form['credentials']['api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('API Key'),
      '#default_value' => $config->get('api_key'),
    ];

    $form['credentials']['api_secret'] = [
      '#type' => 'textfield',
      '#title' => $this->t('API key secret'),
      '#default_value' => $config->get('api_secret'),
    ];

    $form['flickr_api'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Flickr API Settings'),
      '#description' => $this->t('The following settings connect Flickr API module with external APIs.'),
    ];

    $form['flickr_api']['host_uri'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Flickr URL'),
      '#default_value' => $config->get('host_uri'),
    ];

    $form['flickr_api']['api_uri'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Flickr API URL'),
      '#default_value' => $config->get('api_uri'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('flickr_api.settings')
      ->set('api_key', $form_state->getValue('api_key'))
      ->set('api_secret', $form_state->getValue('api_secret'))
      ->set('host_uri', $form_state->getValue('host_uri'))
      ->set('api_uri', $form_state->getValue('api_uri'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
