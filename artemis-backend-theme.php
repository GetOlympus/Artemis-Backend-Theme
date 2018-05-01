<?php

namespace ArtemisBackendTheme;

/**
 * OLYMPUS ARTEMIS BACKEND THEME
 *
 * Plugin Name: Olympus Artemis Backend Theme
 *
 * Description: Olympus Artemis is a backend theme WordPress plugin used to make admin panel more attractive.
 * Author: Achraf Chouk <achrafchouk@gmail.com>
 * Version: 0.0.1
 *
 * Author URI: https://github.com/crewstyle
 * Plugin URI: https://github.com/GetOlympus/Artemis-Backend-Theme
 * Text Domain: olympus-artemis
 * Domain Path: /languages
 * License: The MIT License (MIT)
 * License URI: http://opensource.org/licenses/MIT
 *
 * The MIT License (MIT)
 *
 * Copyright (C) Achraf Chouk - achrafchouk@gmail.com
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

if (!defined('ABSPATH')) {
    die('You are not authorized to directly access to this page');
}


/**
 * Require constants
 */

// Directory separator
defined('S')                    or define('S', DIRECTORY_SEPARATOR);

// Admin panel or not, constant defined in main Olympus framework (mu-plugins autoloaded)
defined('OL_ISADMIN')           or define('OL_ISADMIN', is_admin());
// Vendor package, constant defined in main Olympus framework
defined('VENDORPATH')           or define('VENDORPATH', realpath(dirname(__DIR__)).S.'vendor'.S);

/**
 * Define constants
 */

// Dictionary key
define('OL_ARTEMIS_DICTIONARY', 'olympus-artemis');
// Resources path.
define('OL_ARTEMIS_RESOURCESPATH', realpath(dirname(__FILE__)).S.'resources'.S);
// Configurations path
define('OL_ARTEMIS_CONFIGSPATH', OL_ARTEMIS_RESOURCESPATH.'configs'.S);
// Controllers path
define('OL_ARTEMIS_CONTROLLERSPATH', OL_ARTEMIS_RESOURCESPATH.'controllers'.S);

/**
 * ArtemisBackendTheme class
 */

if (!class_exists('ArtemisBackendTheme')) {
    class ArtemisBackendTheme extends \GetOlympus\Zeus\Zeus
    {
        /**
         * Constructor.
         */
        protected function setVars()
        {
            // Load Zeus framework vendors.
            if (file_exists($autoload = VENDORPATH.'autoload.php')) {
                include $autoload;
            }

            /**
             * Start working here.
             */

            /**
             * Initialize configurations
             *
             * Add configuration you need to iniitlaize.
             * You can init 5 kinds of configurators:
             *
             * - AdminThemesConfiguration able to add login and register custimzations
             * - AccessManagementConfiguration able to add custom admin CSS
             * - MenusConfiguration able to add custom menus navigation
             * - SettingsConfiguration able to add custom backend and frontend settings
             * - ShortcodesConfiguration able to add custom shortcodes
             * - SidebarsConfiguration able to add custom sidebars and widgets areas
             * - SizesConfiguration able to add custom media sizes
             * - SupportsConfiguration able to add post types and themes supports
             *
             * @param array $args
             */
            $this->configurations = [
                // Alias to load                => File path to associate
                'AdminThemesConfiguration'      => OL_ARTEMIS_CONFIGSPATH.'admin-themes.php',
                'AccessManagementConfiguration' => OL_ARTEMIS_CONFIGSPATH.'access-management.php',
            ];

            /**
             * Initialize custom components.
             *
             * Add simply here all your required folders.
             * Hera application will load classes as a map
             * and initialize them.
             * You can init all kinds of objects:
             *
             * - adminpages which contains all custom admin pages
             * - extras which contains all custom extra datas such as user or comment details
             * - posttypes which contains all your custom post types
             * - terms which contains all your custom terms and taxonomies
             * - widgets which contains all your custom widgets
             * - and more coming soon...
             *
             * @param array $args
             */
            $this->paths = [
                // Action to make   => Array of File paths to associate
                'admin_menu'        => [
                    OL_ARTEMIS_CONTROLLERSPATH.'adminpages',
                ],
            ];
        }
    }
}

// Instanciate ArtemisBackendTheme
new ArtemisBackendTheme();
