<?php
get_header();

?>
    <div class="container">
        <div class="row">

            <div class="row featurette">
                <div class="col-md-7">
                    <div class="film-box">

                    <h2 class="featurette-heading"> <?php echo the_title(); ?></h2>
                        <p> Release year: <?php echo get_post_meta( $post->ID, 'post_year', true ); ?></p>
                        <p>Actors: <?php $terms = wp_get_post_terms($post->ID, 'actor-type');
	                        if ($terms) {
		                        $out = array();
		                        foreach ($terms as $term) {
			                        $out[] = '<a class="' .$term->slug .'" href="' .get_term_link( $term->slug,
                                            'actor-type') .'">' .$term->name .'</a>';
		                        }
		                        echo join( ',&nbsp; ', $out );}
	                        ?></p>
                        <p>Ganre: <?php $terms = wp_get_post_terms($post->ID, 'ganre-type');
		                    if ($terms) {
			                    $out = array();
			                    foreach ($terms as $term) {
				                    $out[] = '<a class="' .$term->slug .'" href="' .get_term_link( $term->slug,
						                    'ganre-type') .'">' .$term->name .'</a>';
			                    }
			                    echo join( ',&nbsp; ', $out );}
		                    ?></p>
                    <p class="lead"><?php the_content(); ?></p>
                </div>
                </div>
                <div class="col-md-5">
                <div class="sidebar-box">
                <?php get_sidebar();?>
                </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();