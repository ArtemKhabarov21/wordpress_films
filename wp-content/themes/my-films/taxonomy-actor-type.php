<?php

get_header();

?>
    <main>


        <div class="arhive">

            <div class="container">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
                <hr>
                <div class="row">
					<?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>"
                                     data-holder-rendered="true">
                                <div class="card-body">
                                    <h3><?php echo the_title(); ?> </h3>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-secondary" href="<?php the_permalink(); ?>"
                                               role="button"><?php echo __( 'View details »' ); ?></a>
                                        </div>
                                        <small class="text-muted">
                                            <p> <?php echo __( 'Release year:' ); ?><?php echo get_post_meta( $post->ID,
													'post_year', true ); ?></p></small>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endwhile; ?>

                </div>
                <hr>

            </div> <!-- /container -->

    </main>
<?php
get_footer();
