<?php

declare(strict_types=1);

/*
Plugin Name: WP Elementor React
Author: Chris Daßler
Author URI: https://dsoft-app-dev.de
Description: Test plugin for showing how to make a plugin with React JS and TypeScript for Elementor
Version: 0.1
License: no
License URI: https://dsoft-app-dev.de
Text Domain: wpelementorreact
Tags: react, typescript, tutorial, test-plugin, psr12
*/

defined('ABSPATH') || exit;
define('WPELEMENTORREACT_PATH', plugin_dir_path(__FILE__));
define('WPELEMENTORREACT_URL', plugin_dir_url(__FILE__));

require_once 'vendor/autoload.php';

try {
    (new WpElementorReact\Hook())->init();
} catch (Throwable $e) {
    error_log($e->getMessage());
}
