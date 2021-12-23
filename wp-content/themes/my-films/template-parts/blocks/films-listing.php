<?php $movies = get_field( 'Film_listing' ) ?: [];?>
<div class="container">
	<h2><?php echo get_field('title_block') ?></h2>
	<div class="row row-cols-3">
		<?php foreach ( $movies as $movie ) : ?>
			<div class="col h-100">
				<div class="card mb-6">
					<div class="row g-0">
						<div class="col-md-4">
							<?php echo get_the_post_thumbnail( $movie, 'medium', [
								'class' => 'img-fluid',
							] ); ?>
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?php echo get_the_title( $movie ); ?></h5>
								<p class="card-text"><?php echo  wp_trim_words(get_the_excerpt( $movie ), 20, '' );?></p>
								<p class="card-text">

								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>