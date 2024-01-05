<?php
/**
 * demo
 *
 * @package           PluginPackage
 * @author            Your Name
 * @copyright         2019 Your Name or Company Name
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       demo
 * Plugin URI:        /
 * Description:       This is a testing plugin  .
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Your Name
 * Author URI:        https://example.com
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */

 // it will protext the folder from direct access

use Inc\Base\Activate;
use Inc\Base\Deactivate;

defined("ABSPATH") or die("No direct script access allowed");

// Require composer auto load
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

// Declaring global variable for constant variables


function activate_test_demo_plugin(){
    // require_once(dirname(__FILE__) .'/Inc/demo-plugin-activate.php');    
    Activate::activate();

}

function deactivate_test_demo_plugin(){
    Deactivate::deactivate();
    // flush_rewrite_rules();
}

register_activation_hook(__FILE__,'activate_test_demo_plugin');
register_deactivation_hook(__FILE__,'deactivate_test_demo_plugin');


if(class_exists('Inc\\Init')){
    Inc\Init::register_services();
}