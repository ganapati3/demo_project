<?php
namespace Inc\Base;

class Activate{
    public static function activate(){
        // echo 'Hello <strong>World</strong>' ;
        flush_rewrite_rules();
    }

}