<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
            <img src="<?php echo get_field('image') ?>"
                 class="d-block w-100" alt="...">
			<div class="background-overlay"></div>
			<div class="carousel-caption">
				<h5 class="display-4 h4-md mb-4 font-weight-bold"><?php echo get_field('title') ?></h5>
				<p class="h4 mb-5 pb-3 text-white-50"><?php echo get_field('decr') ?></p>
				<a href="<?php echo get_field('button_link') ?>" class="btn btn-lg btn-danger"><?php echo get_field('button_text') ?></a> </div>
		</div>

	</div>
</div>