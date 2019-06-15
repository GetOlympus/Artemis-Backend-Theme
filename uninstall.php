<?php

/**
 * Fired when Artemis Backend Theme plugin is uninstalled when it works as is.
 *
 * @category PHP
 * @package  ArtemisBackendTheme
 * @author   Achraf Chouk <achrafchouk@gmail.com>
 * @since    0.0.1
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die('You are not authorized to directly access to this page');
}

global $wpdb;

// Prepare custom Artemis options
$options = [
    'ol_artemis_login_theme',
    'ol_artemis_login_header_title',
    'ol_artemis_login_header_url',
    'ol_artemis_login_shake'
];

// Multisite case
if (is_multisite()) {
    // Get all sites
    $blogs = $wpdb->get_results("SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A);

    // Iterate if found
    if ($blogs) {
        foreach ($blogs as $blog) {
            // Switch to select blog
            switch_to_blog($blog['blog_id']);

            // Remove all blog options
            foreach ($options as $opt) {
                delete_option($opt);
            }

            // Optimize table
            $wpdb->query("OPTIMIZE TABLE `".$wpdb->prefix."options`");

            // Switch back to current blog
            restore_current_blog();
        }
    }
} else {
    // Remove all options
    foreach ($options as $opt) {
        delete_option($opt);
    }

    // Optimize table
    $wpdb->query("OPTIMIZE TABLE `".$wpdb->prefix."options`");
}

// Remove Artemis themes cache file

unlink(CACHEPATH.'artemisbackendtheme-themes.php');
