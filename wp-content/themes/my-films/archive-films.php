<?php get_header();  ?>
    <div class="container">
        <h1><?php echo get_the_archive_title(); ?></h1>
        <hr>
        <div class="row">
			<?php echo get_template_part( 'template-parts/filter' ); ?>
			<?php
			if ( have_posts() ):
				while ( have_posts() ) : the_post(); ?>
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
                                           role="button"><?php echo __( 'View details »', MY_FILMS_TEXT_DOMAIN ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endwhile;
			else :
				echo "<p class='no-posts'>" . __( "Sorry, there are no posts at this time.", MY_FILMS_TEXT_DOMAIN ) . "</p>";
			endif; ?>
        </div>
    </div>

<?php
get_footer();
