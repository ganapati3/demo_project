<?php

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;


class Dashboard extends BaseController {

    public $settings;
    public $pages;
    public $callbacks;
    public $callbacks_manager;

    public $subpages;

    public function register() {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->callbacks_manager = new ManagerCallbacks();
        // $this -> setSubPages();
        $this->setPages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();
        // add_action('admin_menu',array($this,'add_admin_pages'));
        $this->settings->AddPages($this->pages)->withSubpages('Dashboard')->register();
    }

    public function setPages() {

        $this-> pages = [
            ['page_title' => 'Test Demo',
            'menu_title'=>'Test',
            'capability'=> 'manage_options',
            'menu_slug' => 'test_plugin',
            'callback'=> array($this->callbacks,'adminDashboards') ,
            'icon_url' => 'dashicons-store',
            'position' => 110,]
        ];

    }

    // public function setSubPages(){
    //     $this-> subpages = [
    //         ['parent_slug' => 'test_plugin',
    //         'page_title'=>'Custom Post Types',
    //         'menu_title'=>'CPT',
    //         'capability'=> 'manage_options',
    //         'menu_slug' => 'demo_cpt',
    //         'callback'=>  array( $this->callbacks, 'adminCpt' ) ,
    //         'position' => 110,
    //         ],
    //         ['parent_slug' => 'test_plugin', 
    //         'page_title' => 'Custom Taxonomies', 
    //         'menu_title' => 'Taxonomies', 
    //         'capability' => 'manage_options', 
    //         'menu_slug' => 'demo_taxonomies', 
    //         'callback' => array( $this->callbacks, 'adminTaxonomy' ),
    //         'position' => 110,
    //         ],
    //         [
    //         'parent_slug' => 'test_plugin', 
    //         'page_title' => 'Custom Widgets', 
    //         'menu_title' => 'Widgets', 
    //         'capability' => 'manage_options', 
    //         'menu_slug' => 'demo_widgets', 
    //         'callback' => array( $this->callbacks, 'adminWidget' ),
    //         'position' => 110,
    //         ]
    //     ];

    // }


    public function setSections() {
        $args = [
            [
                'id' => 'demo_admin_index',
                'title'=> 'Settings Manager',
                'callback'=> array($this->callbacks_manager,'adminSectionManager') ,
                'page'=> 'test_plugin' ,
            ]
        ];

        $this->settings->setsections($args);
    }

    public function setFields() {
        $args = array() ;
        foreach ($this->managers as $key => $value) {
            $args[] = array(
                
                'id' => $key,
                'title'=> $value,
                'callback'=> array($this->callbacks_manager,'checkboxField') ,
                'page'=> 'test_plugin' ,
                'section' => 'demo_admin_index',
                'args'=>array(
                    'label_for' => $key,
                    'class'=> 'ui-toggle' ,
                    )
                );
        }
        // $args = [
        //     [
        //         'id' => 'cpt_manager',
        //         'title'=> 'Activate CPT Manager',
        //         'callback'=> array($this->callbacks_manager,'checkboxField') ,
        //         'page'=> 'test_plugin' ,
        //         'section' => 'demo_admin_index',
        //         'args'=>array(
        //             'label_for' => 'cpt_manager',
        //             'class'=> 'ui-toggle' ,
        //             )
        //         ],
        //         [
        //             'id' => 'taxonomy_manger',
        //             'title'=> 'Activate Taxonomy Manager',
        //             'callback'=> array($this->callbacks_manager,'checkboxField') ,
        //             'page'=> 'test_plugin' ,
        //             'section' => 'demo_admin_index',
        //             'args'=>array(
        //                 'label_for' => 'taxonomy_manger',
        //                 'class'=> 'ui-toggle' ,
        //             )
        //         ],
        //         [
        //             'id' => 'media_widget',
        //             'title'=> 'Activate Media Manager',
        //             'callback'=> array($this->callbacks_manager,'checkboxField') ,
        //             'page'=> 'test_plugin' ,
        //             'section' => 'demo_admin_index',
        //             'args'=>array(
        //             'label_for' => 'media_widget',
        //             'class'=> 'ui-toggle' ,
        //         )
        //         ],
        //         [
        //             'id' => 'gallery_manager',
        //             'title'=> 'Activate Gallery Manager',
        //             'callback'=> array($this->callbacks_manager,'checkboxField') ,
        //             'page'=> 'test_plugin' ,
        //             'section' => 'demo_admin_index',
        //             'args'=>array(
        //             'label_for' => 'gallery_manager',
        //             'class'=> 'ui-toggle' ,
        //             )
        //         ],
        //         [
        //         'id' => 'testinomial_manager',
        //         'title'=> 'Activate Testinomial Manager',
        //         'callback'=> array($this->callbacks_manager,'checkboxField') ,
        //         'page'=> 'test_plugin' ,
        //         'section' => 'demo_admin_index',
        //         'args'=>array(
        //         'label_for' => 'testinomial_manager',
        //         'class'=> 'ui-toggle' ,
        //         )
        //         ],
        //         [
        //         'id' => 'template_manager',
        //         'title'=> 'Activate Template Manager',
        //         'callback'=> array($this->callbacks_manager,'checkboxField') ,
        //         'page'=> 'test_plugin' ,
        //         'section' => 'demo_admin_index',
        //         'args'=>array(
        //         'label_for' => 'template_manager',
        //         'class'=> 'ui-toggle' ,
        //         )
        //         ],
        //         [
        //         'id' => 'login_manager',
        //         'title'=> 'Activate Login Manager',
        //         'callback'=> array($this->callbacks_manager,'checkboxField') ,
        //         'page'=> 'test_plugin' ,
        //         'section' => 'demo_admin_index',
        //         'args'=>array(
        //         'label_for' => 'login_manager',
        //         'class'=> 'ui-toggle' ,
        //         )
        //         ],
        //         [
        //         'id' => 'membership_manager',
        //         'title'=> 'Activate Membership Manager',
        //         'callback'=> array($this->callbacks_manager,'checkboxField') ,
        //         'page'=> 'test_plugin' ,
        //         'section' => 'demo_admin_index',
        //         'args'=>array(
        //         'label_for' => 'membership_manager',
        //         'class'=> 'ui-toggle' ,
        //         )
        //         ],
        //         [
        //         'id' => 'chat_manager',
        //         'title'=> 'Activate Chat Manager',
        //         'callback'=> array($this->callbacks_manager,'checkboxField') ,
        //         'page'=> 'test_plugin' ,
        //         'section' => 'demo_admin_index',
        //         'args'=>array(
        //         'label_for' => 'chat_manager',
        //         'class'=> 'ui-toggle' ,
        //         )
        //         ],
        //     ];

        $this->settings->setFields($args);
    }

    public function setSettings() {
        $args = array() ;
        foreach ($this->managers as $key => $value) {
            $args[] = array(
                'option_group' => 'demo_plugin_settings',
                'option_name'=> $key,
                'callback' => array($this->callbacks_manager, 'checkboxSanitize')
            );
        }
        // $args = [
        //     [
        //         'option_group' => 'demo_plugin_settings',
        //         'option_name'=> 'cpt_manager',
        //         'callback'=> array($this->callbacks,'checkboxSanitize') ,
        //     ],
        //     [
        //         'option_group' => 'demo_plugin_settings',
        //         'option_name'=> 'taxonomy_manager',
        //         'callback'=> array($this->callbacks,'checkboxSanitize') ,
        //     ],
        //     [
        //         'option_group' => 'demo_plugin_settings',
        //         'option_name'=> 'media_widget',
        //         'callback'=> array($this->callbacks,'checkboxSanitize') ,
        //     ],
        //     [
        //         'option_group' => 'demo_plugin_settings',
        //         'option_name'=> 'gallery_manager',
        //         'callback'=> array($this->callbacks,'checkboxSanitize') ,
        //     ],
        //     [
        //         'option_group' => 'demo_plugin_settings',
        //         'option_name'=> 'testinomial_manager',
        //         'callback'=> array($this->callbacks,'checkboxSanitize') ,
        //     ],
        //     [
        //         'option_group' => 'demo_plugin_settings',
        //         'option_name'=> 'template_manager',
        //         'callback'=> array($this->callbacks,'checkboxSanitize') ,
        //     ],
        //     [
        //         'option_group' => 'demo_plugin_settings',
        //         'option_name'=> 'login_manager',
        //         'callback'=> array($this->callbacks,'checkboxSanitize') ,
        //     ],
        //     [
        //         'option_group' => 'demo_plugin_settings',
        //         'option_name'=> 'membership_manager',
        //         'callback'=> array($this->callbacks,'checkboxSanitize') ,
        //     ],
        //     [
        //         'option_group' => 'demo_plugin_settings',
        //         'option_name'=> 'chat_manager',
        //         'callback'=> array($this->callbacks,'checkboxSanitize') ,
        //     ]
        // ];

        $this->settings->setSettings($args);
    }
    // public function add_admin_pages(){
    //     add_menu_page('Test Demo','Test','manage_options','test_plugin',array($this,'admin_index'));
    // }

    // public function admin_index(){  
    //     // require template
    //     require_once $this->plugin_path.'templates/index.html';
    // }
        
}
