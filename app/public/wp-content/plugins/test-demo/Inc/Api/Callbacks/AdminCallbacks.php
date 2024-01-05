<?php

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController {
    public function adminDashboards() {
        return require_once($this->plugin_path  ."templates/admin.php");
    }

    public function adminCpt()
	{
		return require_once( $this->plugin_path  ."templates/cpt.php" );
	}

	public function adminTaxonomy()
	{
		return require_once( $this->plugin_path  ."templates/taxonomy.php" );
	}

    public function adminauth()
	{
		return require_once( $this->plugin_path  ."templates/auth.php" );
	}
    public function admingallery()
	{
		return require_once( $this->plugin_path  ."templates/gallery.php" );
	}
    public function adminmedia()
	{
		return require_once( $this->plugin_path  ."templates/media.php" );
	}
    public function admintestinomial()
	{
		return require_once( $this->plugin_path  ."templates/testinomial.php" );
	}
	
	public function adminchat()
	{
		return require_once( "$this->plugin_path/templates/chat.php" );
	}
    public function admintemplate()
        {
            return require_once( "$this->plugin_path/templates/template.php" );
        }

    // public function demoOptionsGroup($input) {
    //     return $input;
    // }

    // public function demoAdminSection($input) {
    //     echo 'its working';
    // }

    public function demoAdminTextExample() {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="" placeholder="write here"/>';
    }

    public function demoAdminfirstName() {
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class="regular-text" name="first_name" value="" placeholder="write here"/>';
    }
}

