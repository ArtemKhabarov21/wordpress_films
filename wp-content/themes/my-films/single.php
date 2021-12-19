<?php
get_header();

?>
    <div class="container">
        <div class="row">

            <div class="row featurette">
                <div class="col-md-7">
                    <div class="film-box">

                        <h2 class="featurette-heading"> <?php echo the_title(); ?></h2>


						<?php foreach ( ( get_the_category() ) as $category ) {
							echo '<a href="' . get_category_link( $category->cat_ID ) . '" 
							title="' . $category->cat_name . '">' . $category->cat_name . '</a> ';
						} ?>
                        <p class="lead"><?php the_content(); ?></p>
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
