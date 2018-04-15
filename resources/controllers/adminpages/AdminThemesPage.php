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

        // olh_adminpage_MAINPAGE-SUBPAGE-SUBSECTION_contents
        add_filter('ol_zeus_adminpage_themes-login_contents', function ($contents) use ($path) {
            return [
                \GetOlympus\Field\Text::build('ol_artemis_login_header_title', [
                    'title'         => __('Title', OL_ARTEMIS_DICTIONARY),
                    'description'   => __('Use a custom title for your Login page', OL_ARTEMIS_DICTIONARY),
                ]),
                \GetOlympus\Field\Radio::build('ol_artemis_login_header_url', [
                    'title'         => __('Use your own Website URL on the logo?', OL_ARTEMIS_DICTIONARY),
                    'default'       => 1,
                    'options'       => [
                        0 => __('No', OL_ARTEMIS_DICTIONARY),
                        1 => __('Yes', OL_ARTEMIS_DICTIONARY),
                    ]
                ]),
                \GetOlympus\Field\Text::build('ol_artemis_login_error_message', [
                    'title'         => __('Error message', OL_ARTEMIS_DICTIONARY),
                ]),
                \GetOlympus\Field\Radio::build('ol_artemis_login_custom_css', [
                    'title'         => __('Use custom CSS on login page?', OL_ARTEMIS_DICTIONARY),
                    'description'   => __('By setting this option to <code>Yes</code>, WordPress will only use the default Artemis Backend Theme CSS stylesheet.<br/>The file can be found here: <a href="'.WP_CONTENT_URL.'/plugins/'.$path.'" target="_blank"><code>'.$path.'</code></a>', OL_ARTEMIS_DICTIONARY),
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
