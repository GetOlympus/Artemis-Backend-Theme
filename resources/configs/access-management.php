<?php

/**
 * Add login and register customizations.
 *
 * @category PHP
 * @package  ArtemisBackendTheme
 * @author   Achraf Chouk <achrafchouk@gmail.com>
 * @since    0.0.1
 */

if (!defined('ABSPATH')) {
    die('You are not authorized to directly access to this page');
}

// Generate CSS file path
$path = dirname(dirname(dirname(__FILE__)));
$path = basename($path);

// Generate Home blog
$home = defined('OL_BLOG_HOME') ? OL_BLOG_HOME : get_option('home');

// Check vars: login header
$login_header_title = get_option('ol_artemis_login_header_title', '');
$login_header_url = get_option('ol_artemis_login_header_url', 1);
$login_header = [
    'title' => $login_header_title,
    'url'   => $login_header_url ? $home : false,
];

// Check vars: login shake
$login_shake = get_option('ol_artemis_login_shake', 1);
$login_shake = (bool) $login_shake;

// Check vars: login style
$login_theme = get_option('ol_artemis_login_theme', 'default');
$login_style = 'default' === $login_theme ? [] : [
    'styles'        => [[
        $login_theme,
        WP_PLUGIN_URL.S.$path.S.'resources'.S.'assets'.S.'css'.S.$login_theme.'-login.min.css',
        []
    ]]
];

return [
    /**
     * @var     string  $key    The key used to define theme.
     * @param   string  $args   The theme arguments.
     */

    /**
     * Redisign wp-login.php page with custom header configurations.
     */
    'login-header'  => $login_header,

    /**
     * Define wether if WP has to shake the login box or not.
     */
    'login-shake'   => $login_shake,

    /**
     * Redisign wp-login.php page with custom style and scripts.
     */
    'login-style'   => $login_style,
];
