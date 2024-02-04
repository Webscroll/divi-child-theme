<?php

namespace Webscroll\DiviChild\Loaders\Theme;

class ThemeLoader
{
    public static function load(): void
    {
        $parentStyleHandle = 'divi-style';
        $childStyleHandle = 'child-style';
        $childScriptHandle = 'custom-js';

        $parentStylePath = get_template_directory_uri() . '/style.css';
        $childStylePath = get_stylesheet_directory_uri() . '/style.css';
        $childScriptPath = get_stylesheet_directory_uri() . '/dist/index.js';

        $parentThemeVersion = wp_get_theme()->parent()->get('Version');
        $childThemeVersion = wp_get_theme()->get('Version');

        wp_enqueue_style($parentStyleHandle, $parentStylePath, array(), $parentThemeVersion);
        wp_enqueue_style($childStyleHandle, $childStylePath, array($parentStyleHandle), $childThemeVersion);
        wp_enqueue_script($childScriptHandle, $childScriptPath, array( 'jquery' ), '1.0.0' , true);
    }
}