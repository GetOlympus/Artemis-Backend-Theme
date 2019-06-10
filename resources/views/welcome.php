<?php

/**
 * Welcome page HTML contents
 *
 * @category PHP
 * @package  ArtemisBackendTheme
 * @author   Achraf Chouk <achrafchouk@gmail.com>
 * @since    0.0.1
 */

// Vars
$count = count($themes) - 1;
$profile = admin_url('profile.php');
$packages = [
    0 => [
        'link' => 'https://github.com/GetOlympus/Olympus',
        'name' => __('welcome.packages.olympus.title', 'olympus-artemis'),
        'desc' => __('welcome.packages.olympus.description', 'olympus-artemis'),
    ],
    1 => [
        'link' => 'https://github.com/GetOlympus/Zeus-Core',
        'name' => __('welcome.packages.zeus.title', 'olympus-artemis'),
        'desc' => __('welcome.packages.zeus.description', 'olympus-artemis'),
    ],
];

// Build title
$content = '<h2 class="hndle">'.__('welcome.title', 'olympus-artemis').'</h2>';

// Build inside wrapper
$content .= '<div class="inside">';

// Intro
$content .= '<p>'.__('welcome.intro', 'olympus-artemis').'</p>';

// How-to section
$content .= '<h3>'.__('welcome.howto.title', 'olympus-artemis').'</h3>';
$content .= sprintf('<p>'.__('welcome.howto.content.first', 'olympus-artemis').'</p>', $count, $profile);
$content .= '<p>'.__('welcome.howto.content.second', 'olympus-artemis').'</p>';

// Admin themes section
$content .= '<h3>'.__('welcome.adminthemes.title', 'olympus-artemis').'</h3>';
$content .= $colors;

// Recommended packages section
$content .= '<h3>'.__('welcome.packages.title', 'olympus-artemis').'</h3>';
$content .= '<table class="widefat" cellspacing="0">';

foreach ($packages as $idx => $pack) {
    $content .= '<tr'.(0 === $idx % 2 ? ' class="alternate"' : '').'>';
    $content .= '<td class="row-title">';
        $content .= '<a href="'.$pack['link'].'" target="_blank">'.$pack['name'].'</a><br/>';
        $content .= '<small><em>'.$pack['desc'].'</em></small>';
    $content .= '</td>';
    $content .= '</tr>';
}

$content .= '</table>';
$content .= '<hr/>';

// Outro
$content .= sprintf(
    '<p>'.__('welcome.outro.author', 'olympus-artemis').'</p>',
    'https://github.com/crewstyle',
    'https://github.com/GetOlympus/Artemis-Backend-Theme/blob/master/LICENSE'
);
$content .= sprintf(
    '<p>'.__('welcome.outro.source', 'olympus-artemis').'</p>',
    'https://github.com/GetOlympus/Artemis-Backend-Theme',
    'https://github.com/GetOlympus/Artemis-Backend-Theme'
);

// Inside wrapper
$content .= '</div>';

// Return HTML contents
return $content;
