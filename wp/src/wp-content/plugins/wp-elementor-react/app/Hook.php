<?php

declare(strict_types=1);

namespace WpElementorReact;

final class Hook
{
  public function init(): void
  {
    foreach (get_class_methods($this) as $method) {
      if ($method !== 'init') {
        $this->{$method}();
      }
    }
  }

  /**
   * Takes in and processes a list of shortcode attributes and returns a react component.
   *
   * @param  $atts    An associative array of attributes (i.e. an array of key-value pairs),
   *                  or an empty string if no attributes are given.
   */
  private function registerDummyShortcode(): void
  {
    add_shortcode('react-dummy', static function ($atts): string {
      add_action('wp_enqueue_scripts', function () use ($atts) {
        $path = WPELEMENTORREACT_PATH . 'assets/dummy.js';
        $url = WPELEMENTORREACT_URL . 'assets/dummy.js';

        wp_register_script('wpelementorreact-dummy-js', $url, [], $path, ['strategy' => 'defer']);

        wp_localize_script(
          'wpelementorreact-dummy-js',
          'wpElementorReactGlobals',
          array_merge(
            [
              'ajaxUrl' => admin_url('admin-ajax.php'),
            ],
            is_array($atts) ? $atts : [] // IMPORTANT – Don’t use camelCase or UPPER-CASE for your $atts attribute names
          )
        );

        wp_enqueue_script('wpelementorreact-dummy-js');

        $path = WPELEMENTORREACT_PATH . 'assets/dummy.css';
        $url = WPELEMENTORREACT_URL . 'assets/dummy.css';

        wp_register_style('wpelementorreact-dummy-css', $url, [], $path);
        wp_enqueue_style('wpelementorreact-dummy-css');
      });

      return '<div id="wpelementorreact-dummy"></div>';
    });
  }

  private function registerAnotherDummyShortcode(): void
  {
    add_shortcode('react-anotherdummy', static function ($atts): string {
      add_action('wp_enqueue_scripts', function () use ($atts) {
        $path = WPELEMENTORREACT_PATH . 'assets/anotherdummy.js';
        $url = WPELEMENTORREACT_URL . 'assets/anotherdummy.js';

        wp_register_script('wpelementorreact-anotherdummy-js', $url, [], $path, ['strategy' => 'defer']);

        wp_localize_script(
          'wpelementorreact-anotherdummy-js',
          'wpElementorReactGlobals',
          array_merge(
            [
              'ajaxUrl' => admin_url('admin-ajax.php'),
            ],
            is_array($atts) ? $atts : [] // IMPORTANT – Don’t use camelCase or UPPER-CASE for your $atts attribute names
          )
        );

        wp_enqueue_script('wpelementorreact-anotherdummy-js');

        $path = WPELEMENTORREACT_PATH . 'assets/anotherdummy.css';
        $url = WPELEMENTORREACT_URL . 'assets/anotherdummy.css';

        wp_register_style('wpelementorreact-anotherdummy-css', $url, [], $path);
        wp_enqueue_style('wpelementorreact-anotherdummy-css');
      });

      return '<div id="wpelementorreact-anotherdummy"></div>';
    });
  }
}
