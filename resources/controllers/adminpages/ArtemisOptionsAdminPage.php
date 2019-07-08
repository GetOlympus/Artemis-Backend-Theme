<?php

namespace ArtemisBackendTheme\Controllers\AdminPages;

class ArtemisOptionsAdminPage extends \GetOlympus\Zeus\AdminPage\Controller\AdminPage
{
    /**
     * @var string
     */
    protected $identifier = 'artemis-options';

    /**
     * @var string
     */
    protected $parent = 'themes.php';

    /**
     * Prepare variables.
     */
    public function setVars()
    {
        // Generate Blog site url and name
        $site = defined('OL_BLOG_HOME') ? OL_BLOG_HOME : get_option('home');
        $name = defined('OL_BLOG_NAME') ? OL_BLOG_NAME : get_bloginfo('name');
        $vars = $this->getJsonFromCache();

        // Add page
        $this->addPage('artemis-options', [
            'title'     => __('admin.artemis.title', 'olympus-artemis'),
            'name'      => __('admin.artemis.name', 'olympus-artemis'),
        ]);

        // Add section
        $this->addSection('welcome', 'artemis-options', [
            'title'     => __('admin.artemis.welcome', 'olympus-artemis'),
            'submit'    => false,
            'fields'    => [
                \GetOlympus\Field\Content::build('', [
                    'file' => OL_ARTEMIS_RESOURCESPATH.'views'.S.'welcome.php',
                    'vars' => $vars,
                ]),
            ],
        ]);

        // Add section
        $this->addSection('login', 'artemis-options', [
            'title'     => __('admin.artemis.login', 'olympus-artemis'),
            'submit'    => true,
            'fields'    => [
                \GetOlympus\Field\Radio::build('ol_artemis_login_theme', [
                    'title'       => __('admin.login.theme.title', 'olympus-artemis'),
                    'default'     => 'default',
                    'description' => sprintf(__('admin.login.theme.description', 'olympus-artemis'), $vars['profile']),
                    'options'     => $vars['themes'],
                ]),
                \GetOlympus\Field\Text::build('ol_artemis_login_header_title', [
                    'title'       => __('admin.login.headertitle.title', 'olympus-artemis'),
                    'default'     => $name,
                    'description' => __('admin.login.headertitle.description', 'olympus-artemis'),
                    'placeholder' => $name,
                ]),
                \GetOlympus\Field\Toggle::build('ol_artemis_login_header_url', [
                    'title'       => __('admin.login.headerurl.title', 'olympus-artemis'),
                    'default'     => true,
                ]),
                \GetOlympus\Field\Toggle::build('ol_artemis_login_shake', [
                    'title'       => __('admin.login.shake.title', 'olympus-artemis'),
                    'default'     => true,
                ]),
            ],
        ]);
    }

    /**
     * Get JSON from cache
     */
    protected function getJsonFromCache()
    {
        // Initialize vars
        $colors = '';
        $themes = [
            'default' => __('admin.default.wordpress', 'olympus-artemis'),
        ];

        // Get all themes
        if (file_exists($cachefile = CACHEPATH.'artemisbackendtheme-themes.php')) {
            $jsons = include $cachefile;
            $before  = 'background-color:';
            $after = ';display:inline-block;width:43px';

            foreach ($jsons as $theme => $options) {
                $themes[$theme] = '';

                $colors .= '<div class="color-option">';
                $colors .= '<label>'.$options['name'].'</label>';
                $colors .= '<table class="color-palette"><tr>';

                foreach ($options['colors'] as $color) {
                    $themes[$theme] .= '<span style="'.$before.$color.$after.'">&nbsp;</span>';
                    $colors .= '<td style="'.$before.$color.'">&nbsp;</td>';
                }

                $themes[$theme] .= '&nbsp;'.$options['name'];

                $colors .= '</tr></table>';
                $colors .= '</div>';
            }
        }

        // Return everything
        return [
            'colors'  => $colors,
            'profile' => admin_url('profile.php'),
            'themes'  => $themes,
        ];
    }
}
