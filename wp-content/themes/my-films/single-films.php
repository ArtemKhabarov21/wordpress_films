<?php get_header();  ?>
    <div class="container">
        <div class="row">

            <div class="row featurette">
                <div class="col-md-7">
                    <div class="film-box">
                        <h2 class="featurette-heading"> <?php echo the_title(); ?></h2>
                        <p> <?php echo __( 'Release year:' ); ?><?php echo get_field( "release_year" ); ?></p>
                        <p> <?php echo __( 'Pg:' ); ?><?php echo get_field( "pg" ); ?></p>
                        <p> <?php echo __( 'Rating imdb:' ); ?><?php echo get_field( "rating" ); ?></p>
                        <p><?php echo __( 'Actors:' ); ?><?php $terms = wp_get_post_terms( $post->ID, 'actor-type' );
							if ( $terms ) {
								$out = array();
								foreach ( $terms as $term ) {
									$out[] = '<a class="' . $term->slug . '" href="' . get_term_link( $term->slug,
											'actor-type' ) . '">' . $term->name . '</a>';
								}
								echo join( ',&nbsp; ', $out );
							}
							?></p>
                        <p><?php echo __( 'Ganre:' ); ?><?php $terms = wp_get_post_terms( $post->ID, 'ganre-type' );
							if ( $terms ) {
								$out = array();
								foreach ( $terms as $term ) {
									$out[] = '<a class="' . $term->slug . '" href="' . get_term_link( $term->slug,
											'ganre-type' ) . '">' . $term->name . '</a>';
								}
								echo join( ',&nbsp; ', $out );
							}
							?></p>
                        <p class="lead"><?php the_content(); ?></p>
                        <hr>
						<?php echo get_template_part( 'template-parts/new-films' ); ?>
                    </div>

                </div>

                <div class="col-md-5">
                    <div class="sidebar-box">
						<?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();