<?php

namespace Inc\Api;

class SettingsApi {

    public $admin_page = array();
    public $admin_subpages = array(); 
    public $settings = array();   
    public $sections = array();   
    public $fields = array();   



    public function register(){
        if(!empty($this->admin_page) || !empty($this->admin_subpages)){ 
            add_action("admin_menu", array($this,"addAdminPage"));
        }

        if(!empty($this->settings)){
            add_action("admin_init", array($this,"registerCustomFields"));
        }
    }

    public function withSubPages(string $title = null){
        if (empty($this->admin_page)){
            return $this;
        }
        $admin_page = $this->admin_page[0];

        $subpages = [
            ['parent_slug' => $admin_page['menu_slug'],
            'page_title'=>$admin_page['page_title'],
            'menu_title'=> $title ? $title:$admin_page['menu_title'] ,
            'capability'=> $admin_page['capability'],
            'menu_slug' => $admin_page['menu_slug'],
            'callback'=> function(){echo '<h1></h1>';} ,
            'position' => 110,
            ]
        ];

        $this->admin_subpages = $subpages;
        return $this;   

    }

    public function addSubPages(array $subpages){
        $this->admin_subpages = array_merge($this->admin_subpages, $subpages);
        return $this;

    }

    public function AddPages(array $pages) {
        $this -> admin_page =  $pages;
        return $this;
    }

    public function addAdminPage(){
        foreach($this->admin_page as $page){
            add_menu_page($page["page_title"], $page["menu_title"], $page["capability"], $page["menu_slug"], $page["callback"], $page[ "icon_url"], $page["position"]) ;
        }
        // echo var_dump($this->admin_subpages)    ;
        foreach($this->admin_subpages as $page){
            add_submenu_page($page["parent_slug"], $page["page_title"],$page["menu_title"], $page["capability"], $page["menu_slug"], $page["callback"], $page["position"]) ;
        }
    } 

    public function setSettings(array $settings) {
        $this -> settings =  $settings;
        return $this;
    }

    public function setSections(array $sections) {
        $this -> sections =  $sections;
        return $this;
    }

    public function setFields(array $fields) {
        $this -> fields =  $fields;
        return $this;
    }

    public function registerCustomFields(){
        //register settings
        foreach($this->settings as $setting){
            register_setting($setting["option_group"],$setting["option_name"],isset($setting["callback"]) ? $setting["callback"] :'' );
        }

        //add setting section
        foreach($this->sections as $section){
            add_settings_section($section["id"],$section["title"],isset($section["callback"]) ? $section["callback"] :'' ,$section["page"]);
        }

        // add settings fields
        foreach($this->fields as $field){
            add_settings_field($field["id"],$field["title"],isset($field["callback"]) ? $field["callback"] :    "",$field["page"],$field["section"],isset($field["args"]) ? $field["args"] :    "") ;
        }

        
    }
}