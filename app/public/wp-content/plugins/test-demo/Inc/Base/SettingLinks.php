<?php

namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingLinks extends BaseController {
    public function register() {
        add_filter('plugin_action_links_'.$this->plugin_name,array($this,'setting_link'));
}
    public function setting_link($links){
        // add custom settings
        $settings_link = '<a href="http://demo.local/wp-admin/admin.php?page=test_plugin">Settings</a>';
        array_push( $links, $settings_link );
        return $links;
    }
    
    public function add_admin_pages(){
        add_menu_page('Test Demo','Test','manage_options','test_plugin',array($this,'admin_index'));
    }

    public function admin_index(){  
        // require template
        require_once $this->plugin_path . 'templates/admin.php';
    }
        
}
