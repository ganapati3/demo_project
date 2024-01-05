<?php

namespace Inc\Base;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class AuthController extends BaseController {
    public $subpages = [];
    public $callbacks;
    public $callbacks_manager;
    public function register()
	{
		if ( ! $this->activated( 'login_manager' ) ) return;

		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setSubpages();

		$this->settings->addSubPages( $this->subpages )->register();

		add_action( 'init', array( $this, 'activate' ) );
	}
    public function activate() {
        register_post_type("test_products", array(
            'labels' => array('name'=> 'Products',
            'singular_name'=> 'Product',
        ),
        'public'=> true,
        'has_archive'=> true,
        ) );
    }

    public function setSubPages(){
        $this-> subpages = [
            ['parent_slug' => 'test_plugin', 
            'page_title' => 'Auth Manager', 
            'menu_title' => 'Auth', 
            'capability' => 'manage_options', 
            'menu_slug' => 'demo_auth', 
            'callback' => array( $this->callbacks, 'adminauth' ),
            'position' => 110,
            ]
        ];

    }

}