<?php

namespace NIX_Lessions\Modules\Blocks;

class locks {
	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_blocks'] );

	}

	public function register_blocks() {

	acf_register_block_type( [
		'name'            => 'Listing_films',
		'title'           => __( 'Listing_films' ),
		'render_template' => 'template-parts/blocks/films-listing.php',
		'icon' => 'book-alt',
		'mode'            => 'edit',
	] );

		acf_register_block_type( [
			'name'            => 'Hero_banner',
			'title'           => __( 'Hero_banner' ),
			'render_template' => 'template-parts/blocks/hero-banner.php',
			'mode'            => 'edit',
		] );
		acf_register_block_type( [
			'name'            => 'Slider',
			'title'           => __( 'Slider' ),
			'render_template' => 'template-parts/blocks/slider.php',
			'mode'            => 'edit',
		] );

		acf_register_block_type( [
			'name'              => 'testimonial',
			'title'             => __('Testimonial'),
			'render_template'   => 'template-parts/blocks/testimonial.php',
			'category'          => 'formatting',
		] );
}


}