<?php

/**
 * Add login and register customizations.
 *
 * @category PHP
 * @package  ArtemisBackendTheme
 * @author   Achraf Chouk <achrafchouk@gmail.com>
 * @since    0.0.1
 */

// Generate CSS file path
$path = dirname(dirname(dirname(__FILE__)));
$path = basename($path);

// Generate Home blog
$home = defined('OL_BLOG_HOME') ? OL_BLOG_HOME : get_option('home');

// Check vars: access urls
$access_url = get_option('ol_artemis_access_url', '');
$access_url = (empty($access_url) ? 'wp-login' : $access_url).'.php';

// Check vars: login error
$login_error = get_option('ol_artemis_login_error_message', 1);

// Check vars: login header
$login_header_title = get_option('ol_artemis_login_header_title', '');
$login_header_url = get_option('ol_artemis_login_header_url', 1);
$login_header = [
    'title' => $login_header_title,
    'url'   => $login_header_url ? $home : false,
];

// Check vars: login shake
$login_shake = get_option('ol_artemis_login_shake', 1);

// Check vars: login style
$login_style_check = get_option('ol_artemis_login_style', 1);
$login_style = !$login_style_check ? [] : [
    'styles'        => [
        'artemis',
        $path.S.'resources'.S.'assets'.S.'css'.S.'artemis.min.css',
        []
    ]
];

return [
    /**
     * @var     string  $key    The key used to define theme.
     * @param   string  $args   The theme arguments.
     */

    /**
     * Hiding wp-login.php in the login and registration URLs
     */
    'access-url'    => $access_url,

    /**
     * Redisign wp-login.php page with custom error message.
     */
    'login-error'   => $login_error,

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
