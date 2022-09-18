<?php
/**
 
 * @package Perpustakaan
 
 */
 
/*
 
Plugin Name: Hangtuah Perpustakaan
 
Plugin URI: Google.com
 
Description: Used by hangtuah, Perpustakaan is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the Perpustakaan plugin and then go to your Wordpress Settings page to set up your API key.
 
Version: 4.1.7
 
Author: Automattic
 
Author URI: https://automattic.com/wordpress-plugins/
 
License: GPLv2 or later
 
Text Domain: unesa
 
*/

require plugin_dir_path(__FILE__) . 'includes/loader.php';
require plugin_dir_path(__FILE__) . 'vendor/autoload.php';

function run()
{
    $loader = new Loader();
    $loader->run();
}

run();