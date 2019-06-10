<?php

namespace ArtemisBackendTheme\Controllers\AdminPages;

class ArtemisOptionsAdminPage extends \GetOlympus\Zeus\AdminPage\Controller\AdminPage
{
    public function setVars()
    {
        // Generate CSS file path
        $path = dirname(dirname(dirname(dirname(__FILE__))));
        $path = basename($path);

        // Generate Blog site url and name
        $site = defined('OL_BLOG_HOME') ? OL_BLOG_HOME : get_option('home');
        $name = defined('OL_BLOG_NAME') ? OL_BLOG_NAME : get_bloginfo('name');
        $colors = '';
        $themes = [
            'default' => __('admin.default.wordpress', 'olympus-artemis'),
        ];

        // Get all themes
        if (file_exists($cachefile = CACHEPATH.'artemisbackendtheme-themes.php')) {
            $jsons = include $cachefile;

            foreach ($jsons as $theme => $options) {
                $themes[$theme] = '<span style="background-color:'.$options['colors'][0].';display:inline-block;width:43px">&nbsp;</span><span style="background-color:'.$options['colors'][1].';display:inline-block;width:43px">&nbsp;</span><span style="background-color:'.$options['colors'][2].';display:inline-block;width:43px">&nbsp;</span><span style="background-color:'.$options['colors'][3].';display:inline-block;width:43px">&nbsp;</span> '.$options['name'];

                $colors .= '<div class="color-option"><label>'.$options['name'].'</label><table class="color-palette"><tr><td style="background-color:'.$options['colors'][0].'">&nbsp;</td><td style="background-color:'.$options['colors'][1].'">&nbsp;</td><td style="background-color:'.$options['colors'][2].'">&nbsp;</td><td style="background-color:'.$options['colors'][3].'">&nbsp;</td></tr></table></div>';
            }
        }

        // Set identifier and parent
        $this->getModel()->setIdentifier('artemis-options');
        $this->getModel()->setParent('themes.php');

        // Add section
        $this->getModel()->addPage('artemis-options', [
            // Page options
            'title'     => __('admin.artemis.title', 'olympus-artemis'),
            'name'      => __('admin.artemis.name', 'olympus-artemis'),
        ]);

        // Add section
        $this->getModel()->addSection('welcome', 'artemis-options', [
            'title'     => __('admin.artemis.welcome', 'olympus-artemis'),
            'submit'    => false,
            'fields'    => [
                \GetOlympus\Field\Html::build('', [
                    'data' => include_once OL_ARTEMIS_RESOURCESPATH.'views'.S.'welcome.php'
                ]),
            ]
        ]);

        // Add section
        $this->getModel()->addSection('login', 'artemis-options', [
            'title'     => __('admin.artemis.login', 'olympus-artemis'),
            'submit'    => true,
            'fields'    => [
                \GetOlympus\Field\Radio::build('ol_artemis_login_theme', [
                    'title'         => __('admin.login.theme.title', 'olympus-artemis'),
                    'description'   => sprintf(__('admin.login.theme.description', 'olympus-artemis'), admin_url('profile.php')),
                    'default'       => 'default',
                    'options'       => $themes,
                ]),
                /*\GetOlympus\Field\Text::build('ol_artemis_access_urls', [
                    'title'         => __('admin.login.url.title', 'olympus-artemis'),
                    'description'   => __('admin.login.url.description', 'olympus-artemis'),
                    'default'       => 'wp-login',
                    'options'       => [
                        'before' => '<code>'.$site.'/</code>',
                        'after'  => '<code>.php</code>',
                    ],
                ]),*/
                \GetOlympus\Field\Radio::build('ol_artemis_login_error_message', [
                    'title'         => __('admin.login.error.title', 'olympus-artemis'),
                    'description'   => sprintf(
                        __('admin.login.error.description', 'olympus-artemis'),
                        __('access.error.message', 'olympus-artemis')
                    ),
                    'default'       => 1,
                    'options'       => [
                        0 => __('admin.default.no', 'olympus-artemis'),
                        1 => __('admin.default.yes', 'olympus-artemis'),
                    ],
                ]),
                \GetOlympus\Field\Text::build('ol_artemis_login_header_title', [
                    'title'         => __('admin.login.headertitle.title', 'olympus-artemis'),
                    'description'   => __('admin.login.headertitle.description', 'olympus-artemis'),
                    'placeholder'   => $name,
                    'default'       => $name,
                ]),
                \GetOlympus\Field\Radio::build('ol_artemis_login_header_url', [
                    'title'         => __('admin.login.headerurl.title', 'olympus-artemis'),
                    'default'       => 1,
                    'options'       => [
                        0 => __('admin.default.no', 'olympus-artemis'),
                        1 => __('admin.default.yes', 'olympus-artemis'),
                    ],
                ]),
                \GetOlympus\Field\Radio::build('ol_artemis_login_shake', [
                    'title'         => __('admin.login.shake.title', 'olympus-artemis'),
                    'default'       => 1,
                    'options'       => [
                        0 => __('admin.default.no', 'olympus-artemis'),
                        1 => __('admin.default.yes', 'olympus-artemis'),
                    ],
                ]),
            ]
        ]);
    }
}
