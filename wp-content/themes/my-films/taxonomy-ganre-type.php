<?php get_header(); ?>
    <main>
        <div class="arhive">
            <div class="container">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
                <hr>
                <div class="row">
					<?php
					$args = array(
						'post_type' => 'films'
					);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) :
							$the_query->the_post(); ?>
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail'); ?>
                                    <div class="card-body">
                                        <h3><?php echo the_title(); ?> </h3>
                                        <p class="card-text"><?php the_excerpt(); ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-secondary" href="<?php the_permalink(); ?>"
                                                   role="button"><?php echo __( 'View details »' , MY_FILMS_TEXT_DOMAIN ); ?></a>
                                            </div>
                                            <small class="text-muted">
                                                <p> <?php echo __( 'Release year:', MY_FILMS_TEXT_DOMAIN  ); ?><?php echo get_post_meta( $post->ID,
														'post_year', true ); ?></p></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
						<?php endwhile;
						wp_reset_postdata();
					else:
					endif;
					?>
                </div>
                <hr>
            </div> <!-- /container -->
    </main>
<?php
get_footer();
