<?php

/**
 * Prevent direct access
 */
if (!defined('ABSPATH')) {
  exit();
}

require_once WPELEMENTORREACT_PATH . '/app/includes/traits/Units.php';
use WpElementorReact\Utils\StringOperations;

class AnotherDummy extends \Elementor\Widget_Base
{
  /**
   * @since 0.0.1
   */
  use Units;

  /**
   * Class constructor.
   *
   * @param array $data Widget data.
   * @param array $args Widget arguments.
   */
  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);
    /**
     * Frontend styles for AnotherDummy
     */
    wp_register_style(
      \WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN . '-anotherdummy',
      WPELEMENTORREACT_URL . 'assets/anotherdummy.css',
      [],
      \WpElementorReact\Hook::PLUGIN_VERSION
    );

    /**
     * Frontend scripts for AnotherDummy
     */
    wp_register_script(
      \WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN . '-anotherdummy',
      WPELEMENTORREACT_URL . 'assets/anotherdummy.js',
      [],
      \WpElementorReact\Hook::PLUGIN_VERSION,
      [
        'in_footer' => 'true',
      ]
    );
    wp_localize_script(\WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN . '-anotherdummy', 'wpElementorReactGlobals', [
      'ajaxUrl' => admin_url('admin-ajax.php'),
    ]);
  }

  public function get_name()
  {
    return 'anotherdummy';
  }

  public function get_title()
  {
    return esc_html__('React AnotherDummy', \WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN);
  }

  public function get_icon()
  {
    return 'eicon-star-o';
  }

  public function get_categories()
  {
    return [\WpElementorReact\Hook::PLUGIN_CATEGORY];
  }

  public function get_keywords()
  {
    return ['react', 'anotherdummy', \WpElementorReact\Hook::PLUGIN_NAME];
  }

  public function get_script_depends()
  {
    error_log('AnotherDummy constructor called.');
    return [\WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN . '-anotherdummy'];
  }

  public function get_style_depends()
  {
    return [\WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN . '-anotherdummy'];
  }

  protected function register_controls()
  {
    $this->start_controls_section('section_content', [
      'label' => esc_html__('React AnotherDummy', \WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN),
      'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]);

    $this->add_control('show_title', [
      'type' => \Elementor\Controls_Manager::SWITCHER,
      'label' => esc_html__('Show title', \WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN),
      'label_on' => esc_html__('Show', \WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN),
      'label_off' => esc_html__('Hide', \WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN),
      'return_value' => 'yes',
      'default' => 'yes',
    ]);

    $this->add_control('title', [
      'type' => \Elementor\Controls_Manager::TEXT,
      'label' => esc_html__('Title', \WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN),
      'placeholder' => esc_html__('Title', \WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN),
      'default' => 'Title',
      'condition' => [
        'show_title' => 'yes',
      ],
    ]);

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();

    $data = [
      'class' => [
        \WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN . '--anotherdummy',
        \WpElementorReact\Hook::PLUGIN_TEXT_DOMAIN . '--anotherdummy-flex',
        isset($settings['custom_class']) ? $settings['custom_class'] : '',
        isset($settings['class']) ? $settings['class'] : '',
      ],
    ];

    if (isset($settings['role'])) {
      $data['role'] = $settings['role'];
    }

    if (isset($settings['name'])) {
      $data['aria-label'] = $settings['name'];
    }

    if (isset($settings['output_format'])) {
      $data['output_format'] = $settings['output_format'];
    }

    $this->add_render_attribute('wrapper', $data);
    ?>
        <div <?php echo $this->get_render_attribute_string('wrapper'); ?>
        >
            <?php if ($settings['show_title']) { ?>
                <h2>
                    <?php echo $settings['title']; ?>
                </h2>
            <?php } ?>
            <div id="wpelementorreact-anotherdummy">React AnotherDummy</div>
        </div>
    <?php
  }
}
