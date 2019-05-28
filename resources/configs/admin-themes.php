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
$rootpath = dirname(OL_ARTEMIS_RESOURCESPATH);
$csspath = basename($rootpath).S.'resources'.S.'assets'.S.'css'.S;
$jsons = [];

// Get cache from file
if (file_exists($cachefile = CACHEPATH.'artemisbackendtheme-themes.php')) {
    $jsons = include_once $cachefile;
    return $jsons;
}

// Iterate on all files
foreach (new DirectoryIterator($rootpath.S.'src'.S.'configs') as $jsonfile) {
    // Check dot or json
    if ($jsonfile->isDot() || !$jsonfile->isFile() || 'json' !== $jsonfile->getExtension()) {
        continue;
    }

    $filepath = file_get_contents($jsonfile->getPathname());
    $filename = $jsonfile->getBasename('.json');
    $contents = json_decode($filepath, true);

    $jsons = array_merge($jsons, [
        /**
         * @var     string  $key    The key used to define theme.
         * @param   string  $args   The theme arguments.
         *
         * @see https://developer.wordpress.org/reference/functions/wp_admin_css_color/
         */
        $filename => [
            // The name of the theme.
            'name'   => __($contents['name'], OL_ARTEMIS_DICTIONARY),
            // The URL of the CSS file containing the color scheme.
            'url'    => WP_PLUGIN_URL.S.$csspath.$filename.'.min.css',
            // An array of CSS color definition strings which are used to give the user a feel for the theme.
            'colors' => [
                $contents['sidebarbackgroundcolor'],
                $contents['primarycolor'],
                $contents['secondarycolor'],
                $contents['bodycolor'],
            ],
            // CSS color definitions used to color any SVG icons.
            'icons'  => [
                // SVG icon base color.
                'base'    => $contents['iconbase'],
                // SVG icon color on focus.
                'focus'   => $contents['iconfocus'],
                // SVG icon color of current admin menu link.
                'current' => $contents['iconcurrent'],
            ],
        ]
    ]);
}

// Create cache file and return result
file_put_contents($cachefile, "<?php\n\n/**\n * File auto-generated.\n */\n\nreturn ".var_export($jsons, true).";\n");

return $jsons;
