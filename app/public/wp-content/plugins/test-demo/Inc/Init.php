<?php
namespace Inc;

final class Init {
    // store classes inside and return a list of classes


    public static function get_services() {
        return [
            Base\Enqueue::class,
            Base\SettingLinks::class,
            Pages\Dashboard::class,
            Base\CustomPosttypeController::class,
            Base\AuthController::class,
            Base\ChatController::class,
            Base\GalleryController::class,
            Base\MediaController::class,
            Base\MembershipController::class,
            Base\TaxonomyController::class,
            Base\TemplateManager::class,
            Base\TestinomialController::class,

        ];
    }

    // Loop through the classes and instantiate and call register method
    public static function register_services() {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );

            if(method_exists( $service,'register') ) {
                $service->register();
            }
        }
    }
    

    // This will return new instance of the class

    private static function instantiate($class){
        $service = new $class();
        return $service;

    }


}


// use Inc\Activate;
// use Inc\Deactivate;
// use Inc\Admin\AdminPages;

// if(! function_exists('TestPlugin')){
//     class TestPlugin
//     {
//         public $plugin;
//         function __construct(){
//             // add_action('init',array($this,'custom_post_type'));
//             $this -> plugin =  plugin_basename(__FILE__);
            
//         }

//         function register(){
//             add_action('wp_enqueue_scripts',array($this,'enqueue'));

//             // it will add new pages
//             add_action('admin_menu',array($this,'add_admin_pages'));

//             add_filter("plugin_action_links_$this->plugin",array($this,'setting_link'));
//         }

//         public function setting_link($links){
//             // add custom settings
//             $settings_link = '<a href="admin.php">Settings</a>';
//             array_push( $links, $settings_link );
//             return $links;
//         }

//         public function add_admin_pages(){
//             add_menu_page('Test Demo','Test','manage_options','test_plugin',array($this,'admin_index'));
//         }

//         public function admin_index(){  
//             // require template
//             require_once plugin_dir_path(__FILE__). 'templates/index.html';
//         }

//         function activate(){
//             // require_once(dirname(__FILE__) .'/Inc/demo-plugin-activate.php');    
//             Activate::activate();
//             // $this -> custom_post_type();
//             // flush_rewrite_rules();
//         }

//         function deactivate(){
//             Deactivate::deactivate();
//             // flush_rewrite_rules();
//         }


//         protected function custom_post_type(){
//             register_post_type('book',['public' => true,'label'=>'Books']);
//         }

//         // function test($name){
//         //     return $name;
//         // }
//         // return 'HelloWorld';
//         function enqueue(){
//             wp_enqueue_style('mypluginstyle',plugins_url('/assets/mystyle.css',__FILE__));
//             wp_enqueue_script('mypluginscript',plugins_url('/assets/myscript.js',__FILE__));

//         }
//     }
// }

// if (class_exists('TestPlugin')){
// $test = new TestPlugin();
// $test->register();

// // $test -> custom_post_type();    
// }

// // activation
// register_activation_hook(__FILE__, array($test,'activate'));


// // deactivation
// // require_once(dirname(__FILE__) .'/Inc/demo-plugin-deactivate.php');    
// register_deactivation_hook(__FILE__, array($test,'deactivate'));

// // register_uninstall_hook();

// // echo $test -> test('testing module');
// // echo 'Hello World';;