<?php

/**
 * Add enqueued backend themes.
 *
 * @category PHP
 * @package  ArtemisBackendTheme
 * @author   Achraf Chouk <achrafchouk@gmail.com>
 * @since    0.0.1
 */

// Generate CSS file path
$path = dirname(dirname(dirname(__FILE__)));
$path = basename($path).S.'resources'.S.'assets'.S.'css'.S.'artemis.min.css';

return [
    /**
     * @var     string  $key    The key used to define theme.
     * @param   string  $args   The theme arguments.
     *
     * @see https://developer.wordpress.org/reference/functions/wp_admin_css_color/
     */
    'artemis'   => [
        // The name of the theme.
        'name'      => __('Artemis', OL_ARTEMIS_DICTIONARY),
        // The URL of the CSS file containing the color scheme.
        'url'       => WP_PLUGIN_URL.S.$path,
        // An array of CSS color definition strings which are used to give the user a feel for the theme.
        'colors'    => ['#47baec', '#ffffff', '#66707c', '#292d38'],
        // CSS color definitions used to color any SVG icons.
        'icons'    => [
            // SVG icon base color.
            'base'      => '#66707c',
            // SVG icon color on focus.
            'focus'     => '#47baec',
            // SVG icon color of current admin menu link.
            'current'   => '#ffffff'
        ],
    ],
];
