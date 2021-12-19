<?php

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
acf_update_setting('show_admin', false);
}

add_filter('acf/settings/show_admin', '__return_false');

function hide_plugins_list_acf( $plugins ) {
	if( in_array( 'advanced-custom-fields-pro/acf.php', array_keys( $plugins ) ) ) {
		unset( $plugins['advanced-custom-fields-pro/acf.php'] );
	}
	return $plugins;
}

add_filter( 'all_plugins', 'hide_plugins_list_acf' );


if ( function_exists( 'acf_add_local_field_group' ) ):

	acf_add_local_field_group( array(
		'key'                   => 'group_61b7658b1a3b4',
		'title'                 => 'For films',
		'fields'                => array(
			array(
				'key'               => 'field_61b76596bf18c',
				'label'             => 'rating imdb',
				'name'              => 'rating',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
			array(
				'key'               => 'field_61b765c4bf18d',
				'label'             => 'Release year',
				'name'              => 'release_year',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
			array(
				'key'               => 'field_61b765dfbf18e',
				'label'             => 'PG',
				'name'              => 'pg',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'maxlength'         => '',
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'films',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => true,
		'description'           => '',
	) );

endif;