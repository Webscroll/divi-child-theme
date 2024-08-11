<?php

namespace Webscroll\DiviChild\Loaders\Fonts;

use Exception;
use Webscroll\DiviChild\Loaders\config\ConfigLoader;

class FontLoader
{
    /**
     * @throws Exception
     */
    public static function websafe_fonts(array $fonts): array
    {
        $fontsConfig = ConfigLoader::get('fonts');

        if (is_array($fontsConfig)) {
            return array_merge($fontsConfig, $fonts);
        }

        return $fonts;
    }
    public static function load()
    {
        $fontStyleUri = get_stylesheet_directory_uri() . '/src/styles/fonts.css';
        wp_enqueue_style('divi-child', $fontStyleUri);
    }
}