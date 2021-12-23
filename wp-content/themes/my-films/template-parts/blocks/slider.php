<?php if( have_rows('slider') ):
	$count = 0; ?>
<div class="container-fluid">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
         <?php while( have_rows('slider') ): the_row();
             $image = get_sub_field('slider_img');
             $text = get_sub_field('slider_text');
             $heading = get_sub_field('heading');
             $button_text = get_sub_field('slider_button_text');
             $link = get_sub_field('slider_link'); ?>
            <div class="carousel-item  <?php if (!$count) { ?> active <?php } ?>">
                <div class="capa w-100" style="background-image: url('<?=$image?>');"></div>
                <div class="carousel-caption d-none d-md-block">
                    <h5><?=$heading?></h5>
                    <p><?=$text?></p>
                    <div class="d-flex">
                        <a href="<?=$link?>"> <button class="btn btn-outline-light me-2"><?=$button_text?></button></a>
                    </div>
                </div>
            </div>
            <?php $count++; ?>
  <?php endwhile;  ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<?php endif; ?>



