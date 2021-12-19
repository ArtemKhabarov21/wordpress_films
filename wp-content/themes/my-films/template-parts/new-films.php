<?php
$new_films = get_posts( [
	'post_type' => 'films',
	'orderby'   => 'publish_date',
	'order'     => 'DESC',
] );
?>
<div class="p-4 bg-light rounded">
    <h4"><?php echo __( 'New Movie' ); ?></h4>
    <ol class="list-unstyled mb-0">
		<?php foreach ( $new_films as $films ): ?>
            <li>
                <a href="<?php echo get_permalink( $films ); ?>">
					<?php echo get_the_title( $films ); ?>
                </a>
            </li>
		<?php endforeach; ?>
    </ol>
</div>