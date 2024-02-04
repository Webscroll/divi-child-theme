<?php
require_once get_stylesheet_directory() . '/vendor/autoload.php';

use Webscroll\DiviChild\Loaders\Fonts\FontLoader;
use Webscroll\DiviChild\Loaders\Theme\ThemeLoader;

/**
 * @uses ThemeLoader::load()
 * Loading the custom divi theme.
 */
add_action('wp_enqueue_scripts'. [ThemeLoader::class, 'load']);

/**
 * @uses FontLoader::enqueue()
 * Loading custom fonts in WordPress.
 */
add_action('wp_enqueue_scripts', [FontLoader::class, 'load']);

/**
 * @see FontLoader::websafe_fonts()
 * @filter et_websafe_fonts
 * Filters the list of websafe fonts with custom ones.
 * This filter runs with a priority of 10 and accepts 2 parameters.
 */
add_filter('et_websafe_fonts', [FontLoader::class, 'websafe_fonts'], 10, 2);