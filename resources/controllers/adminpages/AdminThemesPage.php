<?php

namespace ArtemisBackendTheme\Controllers\AdminPages;

class AdminThemesPage extends \GetOlympus\Zeus\AdminPage\Controller\AdminPage
{
    public function setVars()
    {
        // Update pages
        $this->getModel()->setPages([
            'themes'        => [
                // Page options
                'title'     => __('Artemis themes', OL_ARTEMIS_DICTIONARY),
                'name'      => __('Artemis themes', OL_ARTEMIS_DICTIONARY),
                'sections'  => [
                    'login'     => [
                        'title'     => __('Login page settings', OL_ARTEMIS_DICTIONARY),
                        'submit'    => true,
                    ],
                    'custom'    => [
                        'title'     => __('Login page customizations', OL_ARTEMIS_DICTIONARY),
                        'submit'    => true,
                    ],
                ],
            ],
        ]);
    }

    public function setFilters()
    {
        // Generate CSS file path
        $path = dirname(dirname(dirname(dirname(__FILE__))));
        $path = basename($path).S.'resources'.S.'assets'.S.'css'.S.'artemis.login.min.css';

        // Generate Blog site url and name
        $site = defined('OL_BLOG_HOME') ? OL_BLOG_HOME : get_option('home');
        $name = defined('OL_BLOG_NAME') ? OL_BLOG_NAME : get_bloginfo('name');

        // olh_adminpage_MAINPAGE-SUBPAGE-SUBSECTION_contents
        add_filter('ol_zeus_adminpage_themes-login_contents', function ($contents) use ($path, $site, $name) {
            return [
                \GetOlympus\Field\Text::build('ol_artemis_access_urls', [
                    'title'         => __('Custom login page URL', OL_ARTEMIS_DICTIONARY),
                    'description'   => __('Define a custom login page URL instead of the very known <code>wp-login</code> slug.', OL_ARTEMIS_DICTIONARY),
                    'options'       => [
                        'before' => '<code>/</code>',
                        'after'  => '<code>.php</code>',
                    ],
                ]),
                \GetOlympus\Field\Text::build('ol_artemis_login_error_message', [
                    'title'         => __('Error message', OL_ARTEMIS_DICTIONARY),
                ]),
                \GetOlympus\Field\Text::build('ol_artemis_login_header_title', [
                    'title'         => __('Header title', OL_ARTEMIS_DICTIONARY),
                    'description'   => __('Define a custom title for your login page', OL_ARTEMIS_DICTIONARY),
                    'placeholder'   => $name,
                    'default'       => $name,
                ]),
                \GetOlympus\Field\Radio::build('ol_artemis_login_header_url', [
                    'title'         => __('Use your own Website URL on the logo?', OL_ARTEMIS_DICTIONARY),
                    'default'       => 1,
                    'options'       => [
                        0 => __('No', OL_ARTEMIS_DICTIONARY),
                        1 => __('Yes', OL_ARTEMIS_DICTIONARY),
                    ],
                ]),
                \GetOlympus\Field\Radio::build('ol_artemis_login_style', [
                    'title'         => __('Use custom CSS on login page?', OL_ARTEMIS_DICTIONARY),
                    'description'   => __('By setting this option to <code>Yes</code>, WordPress will only use the default Artemis Backend Theme CSS stylesheet.<br/>The file can be found here: <a href="'.WP_PLUGIN_URL.S.$path.'" target="_blank"><code>'.$path.'</code></a>', OL_ARTEMIS_DICTIONARY),
                    'default'       => 0,
                    'options'       => [
                        0 => __('No', OL_ARTEMIS_DICTIONARY),
                        1 => __('Yes', OL_ARTEMIS_DICTIONARY),
                    ]
                ]),
            ];
        });

        // olh_adminpage_MAINPAGE-SUBPAGE-SUBSECTION_contents
        add_filter('ol_zeus_adminpage_themes-custom_contents', function ($contents) use ($path) {
            return [
                \GetOlympus\Field\Text::build('ol_artemis_login_custom_bg_image', [
                    'title' => __('Background image', OL_ARTEMIS_DICTIONARY),
                ]),
                \GetOlympus\Field\Text::build('ol_artemis_login_custom_bg_color', [
                    'title' => __('Background color', OL_ARTEMIS_DICTIONARY),
                ]),
            ];
        });
    }
}
