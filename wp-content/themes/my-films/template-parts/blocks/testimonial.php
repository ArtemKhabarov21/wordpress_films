<?php if( have_rows('testimonial') ):
	$count = 0; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<section id="testimonials" class="text-center">
				<div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner center-block">
	                <?php while( have_rows('testimonial') ): the_row();
		            $name = get_sub_field('testimonial_name');
		            $text = get_sub_field('testimonial_text'); ?>
						<div class="item <?php if (!$count) { ?> active <?php } ?>">
							<p><?=$text?></p>
							<p class="testimonial_author"><?=$name?></p>
						</div>
					</div>
					<?php $count++; ?>
					<?php endwhile;  ?>
					<a class="left carousel-control" href="#testimonialCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#testimonialCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</section>
		</div>
	</div>
</div>
<?php endif; ?>