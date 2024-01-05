<?php

namespace Inc\Base;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class MembershipController extends BaseController {
    public $subpages = [];
    public $callbacks;
    public $callbacks_manager;
    public function register()
	{
		if ( ! $this->activated( 'membership_manager' ) ) return;

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
            'page_title'=>'Membership Manager',
            'menu_title'=>'Memebership',
            'capability'=> 'manage_options',
            'menu_slug' => 'demo_membership',
            'callback'=>  array( $this->callbacks, 'adminCpt' ) ,
            'position' => 110,
            ]
        ];

    }

}