<?php

namespace ReverseEditions\Controllers\AdminPages;

class ConfigurationsAdminPage extends \GetOlympus\Zeus\AdminPage\Controller\AdminPage
{
    public function setVars()
    {
        // Update pages
        $this->getModel()->setPages([
            'configurations'    => [
                // Page options
                'title'     => __('Configurations', OL_TPL_DICTIONARY),
                'name'      => __('Configurations', OL_TPL_DICTIONARY),
                'icon'      => 'dashicons-admin-generic',
            ],
            'ads'               => [
                // Page options
                'title'     => __('Publicités', OL_TPL_DICTIONARY),
                'name'      => __('Publicités', OL_TPL_DICTIONARY),
                'sections'  => [
                    'wrap'  => [
                        'title'     => 'Habillage',
                        'submit'    => true,
                    ],
                    'interstitial'  => [
                        'title'     => 'Interstitiel',
                        'submit'    => true,
                    ],
                    'ads'   => [
                        'title'     => 'Publicités',
                        'submit'    => true,
                    ],
                    'mobile' => [
                        'title'     => 'Publicités mobile',
                        'submit'    => true,
                    ],
                    'block' => [
                        'title'     => 'Bloqueurs de pub',
                        'submit'    => true,
                    ],
                ],
            ],
            'subscriptions'    => [
                // Page options
                'title'     => __('Souscriptions', OL_TPL_DICTIONARY),
                'name'      => __('Souscriptions', OL_TPL_DICTIONARY),
            ],
        ]);
    }

    public function setFilters()
    {
        // Main page
        add_filter('ol_zeus_adminpage_configurations_contents', function ($contents) {
            return [
                /*\GetOlympus\Field\Radio::build('sidebar_size', [
                    'title' => __('Hauteur de la zone de widgets en page d\'accueil ?', OL_TPL_DICTIONARY),
                    'default' => 1,
                    'options' => [
                        1 => __('1 case en hauteur', OL_TPL_DICTIONARY),
                        2 => __('2 cases en hauteur', OL_TPL_DICTIONARY),
                        3 => __('3 cases en hauteur', OL_TPL_DICTIONARY),
                        4 => __('4 cases en hauteur', OL_TPL_DICTIONARY),
                        5 => __('5 cases en hauteur', OL_TPL_DICTIONARY),
                        6 => __('6 cases en hauteur', OL_TPL_DICTIONARY),
                    ]
                ]),*/
                \GetOlympus\Field\Link::build('magazine_link', [
                    'title' => __('Lien du dernier REVERSE magazine', OL_TPL_DICTIONARY)
                ]),
                \GetOlympus\Field\Text::build('magazine_image', [
                    'title' => __('URL de la couverture du REVERSE magazine', OL_TPL_DICTIONARY)
                ]),
                \GetOlympus\Field\Link::build('beinsport_link', [
                    'title' => __('Lien de la pub BeINSPORTS', OL_TPL_DICTIONARY)
                ]),
                \GetOlympus\Field\Wordpress::build('beinsport_team1', [
                    'title' => __('Equipe 1', OL_TPL_DICTIONARY),
                    'mode' => 'terms',
                    'options' => [
                        'hide_empty' => false,
                        'taxonomy' => 'team',
                    ]
                ]),
                \GetOlympus\Field\Wordpress::build('beinsport_team2', [
                    'title' => __('Equipe 2', OL_TPL_DICTIONARY),
                    'description' => __('', OL_TPL_DICTIONARY),
                    'mode' => 'terms',
                    'options' => [
                        'hide_empty' => false,
                        'taxonomy' => 'team',
                    ]
                ]),
                \GetOlympus\Field\Text::build('beinsport_hour', [
                    'title' => __('Heure de diffusion', OL_TPL_DICTIONARY)
                ]),
            ];
        });

        // ol_zeus_adminpage_MAINPAGE-SUBPAGE-SUBSECTION_contents
        add_filter('ol_zeus_adminpage_configurations-ads-wrap_contents', function ($contents) {
            return [
                \GetOlympus\Field\Radio::build('wrap_enable', [
                    'title' => __('Statut de l\'habillage ?', OL_TPL_DICTIONARY),
                    'default' => 0,
                    'options' => [
                        0 => __('Désactivé', OL_TPL_DICTIONARY),
                        1 => __('Activé', OL_TPL_DICTIONARY),
                    ]
                ]),
                \GetOlympus\Field\Text::build('wrap_link', [
                    'title' => __('Lien sponsorisé', OL_TPL_DICTIONARY),
                    'placeholder' => 'http://...',
                ]),
                \GetOlympus\Field\Code::build('wrap_code', [
                    'title' => __('Code HTML du bloc de publicité', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
                \GetOlympus\Field\Text::build('wrap_background', [
                    'title' => __('Image de fond', OL_TPL_DICTIONARY),
                    'description' => __('Définissez une image de fond avec une zone de contenu de 998 pixels de large.', OL_TPL_DICTIONARY),
                ]),
                \GetOlympus\Field\Color::build('wrap_color', [
                    'title' => __('Couleur de fond', OL_TPL_DICTIONARY),
                    'description' => __('Définissez une couleur de fond.', OL_TPL_DICTIONARY),
                    'default' => '#f6f6f6',
                ]),
                \GetOlympus\Field\Text::build('wrap_log_link', [
                    'title' => __('Lien sponsorisé pour membres connectés', OL_TPL_DICTIONARY),
                    'placeholder' => 'http://...',
                ]),
                \GetOlympus\Field\Code::build('wrap_log_code', [
                    'title' => __('Code HTML du bloc de publicité pour membres connectés', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
                \GetOlympus\Field\Text::build('wrap_log_background', [
                    'title' => __('Image de fond pour membres connectés', OL_TPL_DICTIONARY),
                    'description' => __('Définissez une image de fond avec une zone de contenu de 998 pixels de large.', OL_TPL_DICTIONARY),
                ]),
                \GetOlympus\Field\Color::build('wrap_log_color', [
                    'title' => __('Couleur de fond pour membres connectés', OL_TPL_DICTIONARY),
                    'description' => __('Définissez une couleur de fond.', OL_TPL_DICTIONARY),
                    'default' => '#f6f6f6',
                ]),
            ];
        });

        // ol_zeus_adminpage_MAINPAGE-SUBPAGE-SUBSECTION_contents
        add_filter('ol_zeus_adminpage_configurations-ads-interstitial_contents', function ($contents) {
            return [
                \GetOlympus\Field\Radio::build('interstitial_enable', [
                    'title' => __('Statut de l\'interstitiel ?', OL_TPL_DICTIONARY),
                    'default' => 0,
                    'description' => __('A noter que cet interstitiel n\'apparaît que sur MOBILE.', OL_TPL_DICTIONARY),
                    'options' => [
                        0 => __('Désactivé', OL_TPL_DICTIONARY),
                        1 => __('Activé', OL_TPL_DICTIONARY),
                    ]
                ]),
                \GetOlympus\Field\Text::build('interstitial_link', [
                    'title' => __('Lien sponsorisé', OL_TPL_DICTIONARY),
                    'placeholder' => 'http://...',
                ]),
                \GetOlympus\Field\Text::build('interstitial_background', [
                    'title' => __('Image de fond', OL_TPL_DICTIONARY),
                    'description' => __('Définissez une image de fond avec une zone de contenu de 640 pixels de large et 1136 pixels de haut.', OL_TPL_DICTIONARY),
                ]),
            ];
        });

        // ol_zeus_adminpage_MAINPAGE-SUBPAGE-SUBSECTION_contents
        add_filter('ol_zeus_adminpage_configurations-ads-ads_contents', function ($contents) {
            return [
                \GetOlympus\Field\Code::build('ad_global_top', [
                    'title' => __('Publicité en <b>entête de page</b>', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
                \GetOlympus\Field\Code::build('ad_global_bottom', [
                    'title' => __('Publicité en <b>pied de page</b>', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
                \GetOlympus\Field\Code::build('ad_post_sidebar', [
                    'title' => __('Publicité <b>en sidebar</b> de pages articles', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
                \GetOlympus\Field\Code::build('ad_post_content', [
                    'title' => __('Publicité <b>en-dessous du contenu</b> d\'un article', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
            ];
        });

        // ol_zeus_adminpage_MAINPAGE-SUBPAGE-SUBSECTION_contents
        add_filter('ol_zeus_adminpage_configurations-ads-mobile_contents', function ($contents) {
            return [
                \GetOlympus\Field\Code::build('ad_mobile_global_top', [
                    'title' => __('Publicité en <b>entête de page</b>', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
                \GetOlympus\Field\Code::build('ad_mobile_global_bottom', [
                    'title' => __('Publicité en <b>pied de page</b>', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
                \GetOlympus\Field\Code::build('ad_mobile_post_content', [
                    'title' => __('Publicité <b>en-dessous du contenu</b> d\'un article', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
                \GetOlympus\Field\Code::build('ad_mobile_flow_6', [
                    'title' => __('Publicité <b>à la 6e place</b> du flow en page d\'accueil', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
                \GetOlympus\Field\Code::build('ad_mobile_flow_12', [
                    'title' => __('Publicité <b>à la 12e place</b> du flow en page d\'accueil', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
                \GetOlympus\Field\Code::build('ad_mobile_flow_18', [
                    'title' => __('Publicité <b>à la 18e place</b> du flow en page d\'accueil', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
                \GetOlympus\Field\Code::build('ad_mobile_flow_24', [
                    'title' => __('Publicité <b>à la 24e place</b> du flow en page d\'accueil', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ],
                ]),
            ];
        });

        // ol_zeus_adminpage_MAINPAGE-SUBPAGE-SUBSECTION_contents
        add_filter('ol_zeus_adminpage_configurations-ads-block_contents', function ($contents) {
            return [
                \GetOlympus\Field\Radio::build('adblock_enable', [
                    'title' => __('Statut de la popin pour AdBloqueur ?', OL_TPL_DICTIONARY),
                    'default' => 0,
                    'options' => [
                        0 => __('Désactivé', OL_TPL_DICTIONARY),
                        1 => __('Activé', OL_TPL_DICTIONARY),
                    ]
                ]),
                \GetOlympus\Field\Code::build('adblock_content', [
                    'title' => __('Code HTML du contenu de la popin', OL_TPL_DICTIONARY),
                    'description' => __('Insérer le code HTML.', OL_TPL_DICTIONARY),
                    'default' => [
                        'mode' => 'text/html',
                        'code' => '<div class="ui header">RETOUR EN ZONE !</div>'."\n\n".'<p class="ui subtitle">Chers lecteurs, vous voyez cette page car votre bloqueur de publicité est activé.</p>'."\n\n".'<p>Pour continuer à vivre la <strong>NBA</strong> sur <b>BasketSession</b>, merci de désactiver votre bloqueur de publicité.<br/>Pour une navigation sans publicités, découvrez <b>BasketSession Premium</b> qui vous donnera également accès à tous les contenus Premium en illimité, le journal en format numérique, et bien plus encore !</p>',
                    ],
                    'modes' => [
                        'text/html' => 'HTML',
                    ]
                ]),
                \GetOlympus\Field\Wordpress::build('adblock_register', [
                    'title' => __('Page détail pour devenir membre premium', OL_TPL_DICTIONARY),
                    'description' => __('Laissez vide pour ne pas afficher', OL_TPL_DICTIONARY),
                    'mode' => 'pages',
                ]),
                \GetOlympus\Field\Wordpress::build('adblock_connection', [
                    'title' => __('Page pour se connecter', OL_TPL_DICTIONARY),
                    'description' => __('Laissez vide pour ne pas afficher', OL_TPL_DICTIONARY),
                    'mode' => 'pages',
                ]),
            ];
        });

        // Main page
        add_filter('ol_zeus_adminpage_configurations-subscriptions_contents', function ($contents) {
            return [
                /*\GetOlympus\Field\Text::build('woocommerce_preferences', [
                    'title' => __('Contenu pour les préférences utilisateurs ([pms-account] ou [wppb-edit-profile])', OL_TPL_DICTIONARY)
                ]),*/
                \GetOlympus\Field\Text::build('woocommerce_plans', [
                    'title' => __('Contenu pour les différents plans des membres ([pms-subscriptions])', OL_TPL_DICTIONARY)
                ]),
                \GetOlympus\Field\Text::build('woocommerce_history', [
                    'title' => __('Contenu pour les historiques de paiement ([pms-payment-history])', OL_TPL_DICTIONARY)
                ]),
            ];
        });
    }
}
