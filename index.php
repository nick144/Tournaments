<?php
/*
 * Plugin Name: Tournaments
 * Plugin URI: https://github.com/nick144/Tournaments
 * Description: Add Tournaments adn display them on website.
 * Version: 1.0.0
 * Author: Dominic Fernandes
 * Author URI: https://github.com/nick144
 * Text Domain: doc_localize
 * License: A short license name. Example: GPL2
 */
 
 
 
 /* *************************************************
 * DEFINE CONSTANT
 * *************************************************/

define('TENNIS_THEME_URL', 'http://tenniscricket.in');
define('TENNIS_THEME_NAME', 'Tennis');
define('TENNIS_DOMAIN', 'tennis');
define('TENNIS_OPT_PREFIX', 'ten_');
define('TENNIS_UPDATE_TIMEOUT', 21600);
define('TENNIS_UPDATE_URL', '');
define('TENNIS_INIT_VERSION', TENNIS_DOMAIN . '-layout-setting-v4');


$plugins_url = plugin_dir_path( __FILE__ );

$tennisOptions = array();

$tennisDirs = array();
//$tennisDirs[] = '/library/shortcodes/';
$tennisDirs[] = 'classes/';

if (is_admin()) {
    $tennisDirs[] = 'classes/ui/';
    $tennisDirs[] = 'classes/ui/radio/';
    $tennisDirs[] = 'classes/ui/radio/list/';
    $tennisDirs[] = 'classes/ui/select/';
    $tennisDirs[] = 'classes/ui/text/';
    $tennisDirs[] = 'classes/ui/complex/';
    $tennisDirs[] = 'cpanel/theme-options/';
}

$tennisDirs[] = 'posttypes/';
$tennisDirs[] = 'metaboxes/';

require_once $plugins_url.'/function.php';

/* *************************************************
 * REQUIRE FILEs
 * *************************************************/


foreach ($tennisDirs as $directory) {
    $path = $plugins_url . $directory . '*.php';
    $files = glob($path);
    
    if ($files) {
        foreach ($files as $file) {
            require_once $file;
        }
    }
}



new WPS_Tournament_Framewrok();
admin_register_assets();