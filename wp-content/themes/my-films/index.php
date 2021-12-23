<?php get_header();     ?>
    <main>
        <div class="arhive">
            <div class="container">
                <h1>Latest films</h1>
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
                                    <?php echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?>

                                    <div class="card-body">
                                        <h3><?php echo the_title(); ?> </h3>
                                        <p class="card-text"><?php the_excerpt(); ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-secondary" href="<?php the_permalink(); ?>"
                                                   role="button">View details »</a>
                                            </div>
                                            <small class="text-muted"><p> Release
                                                    year: <?php echo get_post_meta( $post->ID, 'post_year',
														true ); ?></p></small>
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
                <div class="container">
                    <h1>News</h1>
                    <hr>
                    <div class="row">
						<?php
						if ( have_posts() ):
							// Yep, we have posts, so let's loop through them.
							while ( have_posts() ) : the_post(); ?>
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                        <?php echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?>

                                        <div class="card-body">
                                            <h3><?php echo the_title(); ?> </h3>
                                            <p class="card-text"><?php the_excerpt(); ?></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-secondary" href="<?php the_permalink(); ?>"
                                                       role="button"><?php echo __( 'View details »' ); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php endwhile;
						else :
							// No, we don't have any posts, so maybe we display a nice message
							echo "<p class='no-posts'>" . __( "Sorry, there are no posts at this time." ) . "</p>";
						endif; ?>
                    </div>
                </div>
            </div> <!-- /container -->

    </main>
<?php
get_footer();