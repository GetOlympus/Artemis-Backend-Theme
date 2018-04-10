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
                'title'     => __('Artemis themes', OL_ART_DICTIONARY),
                'name'      => __('Artemis themes', OL_ART_DICTIONARY),
                'sections'  => [
                    'login'     => [
                        'title'     => __('Custom login page', OL_ART_DICTIONARY),
                        'submit'    => true,
                    ],
                ],
            ],
        ]);
    }

    public function setFilters()
    {
        // Generate CSS file path
        $path = dirname(dirname(dirname(__FILE__)));
        $path = basename($path).'resources'.S.'assets'.S.'css'.S.'artemis.login.min.css';

        // olh_adminpage_MAINPAGE-SUBPAGE-SUBSECTION_contents
        add_filter('olh_adminpage_themes-themes-login_contents', function ($contents) use ($path) {
            return [
                \GetOlympus\Field\Radio::build('ol_artemis_use_login_custom', [
                    'title'         => __('Use custom CSS on login page?', OL_ART_DICTIONARY),
                    'description'   => __('By setting this option to \'Yes\', Artemis will only use the default CSS stylesheet.<br/>The stylesheet CSS file can be found in your <code>'.$path.'</code> folder.', OL_ART_DICTIONARY),
                    'default' => 0,
                    'options' => [
                        0 => __('No', OL_ART_DICTIONARY),
                        1 => __('Yes', OL_ART_DICTIONARY),
                    ]
                ]),
                \GetOlympus\Field\Html::build('ol_artemis_html', [
                    'data' => '
                        <h1>Design settings</h1>
                        <h2>HTML</h2>
                    '
                ]),
                \GetOlympus\Field\Background::build('ol_artemis_css_background', [
                    'title'         => __('Set your own background', OL_ART_DICTIONARY),
                    'description'   => __('By setting this option to \'Yes\', Artemis will only use the default CSS stylesheet.<br/>The stylesheet CSS file can be found in your <code>'.$path.'</code> folder.', OL_ART_DICTIONARY),
                    'default' => 0,
                    'options' => [
                        0 => __('No', OL_ART_DICTIONARY),
                        1 => __('Yes', OL_ART_DICTIONARY),
                    ]
                ]),
            ];
        });
    }
}
