<?php

namespace NIX_Lessions\Modules\Acf_options;

class Acf_options {

    public function __construct() {

        add_filter( 'acf/init', [ $this, 'register_option_pages'] );

    }

    public function register_option_pages() {
        acf_add_options_page( [
            'page_title' => 'Settings',
            'menu_title' => 'Settings',
            'menu_slug'  => 'general-settings',
            'capability' => 'edit_posts'
        ] );
    }
}