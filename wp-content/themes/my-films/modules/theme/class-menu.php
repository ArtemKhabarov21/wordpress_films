<?php

namespace NIX_Lessions\Modules\Menu;

class Menu {

	public function __construct() {
		add_action( 'init', [ $this, 'reg_menu'] );

		//add_filter( 'nav_menu_css_class', [ $this, 'add_additional_class_on_li']);

		//add_filter( 'nav_menu_link_attributes', [ $this, 'add_menu_link_class']);

		add_filter( 'nav_menu_submenu_css_class', [ $this, 'my_nav_menu_submenu_css_class'] );



	}

	public function reg_menu() {
		$locations = array(
			'Header' => __( 'Header', 'My_film' ),
		);
		register_nav_menus( $locations );
	}


	public function add_additional_class_on_li( $classes, $item, $args ) {
		if ( isset( $args->add_li_class ) ) {
			$classes[] = $args->add_li_class;
		}

		return $classes;
	}

	public function add_menu_link_class( $atts, $item, $args ) {
		$atts['class'] = 'nav-link';

		return $atts;
	}


	public function my_nav_menu_submenu_css_class( $classes ) {
		$classes[] = 'dropdown-menu';
		return $classes;
	}


}