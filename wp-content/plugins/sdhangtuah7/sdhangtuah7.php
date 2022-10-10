<?php
/**
 
 * @package SdHangtuah7Package
 
 */
 
/*
 
Plugin Name: Hangtuah Addons
 
Plugin URI: Google.com
 
Description: Used by hangtuah, SdHangtuah7Package is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the SdHangtuah7Package plugin and then go to your Wordpress Settings page to set up your API key.
 
Version: 4.1.7
 
Author: Automattic
 
Author URI: https://automattic.com/wordpress-plugins/
 
License: GPLv2 or later
 
Text Domain: unesa
 
*/

require plugin_dir_path(__FILE__) . 'includes/loader.php';
require plugin_dir_path(__FILE__) . 'vendor/autoload.php';
require plugin_dir_path(__FILE__) . 'includes/controllers/EkstrakurikulerController.php';
require plugin_dir_path(__FILE__) . 'includes/controllers/GaleriController.php';
require plugin_dir_path(__FILE__) . 'includes/controllers/PengaturanController.php';
require plugin_dir_path(__FILE__) . 'includes/controllers/PpdbController.php';
require plugin_dir_path(__FILE__) . 'includes/controllers/PrestasiController.php';
require plugin_dir_path(__FILE__) . 'includes/controllers/SdmController.php';
require plugin_dir_path(__FILE__) . 'includes/controllers/TestimoniController.php';
require plugin_dir_path(__FILE__) . 'includes/controllers/InformasiController.php';

function run()
{
    $loader = new Loader();
    $loader->run();
}

run();