<?php
wp_head();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/"><?php echo get_bloginfo( 'name' ); ?></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="main_nav">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'Header',
                                'menu_id'        => 'navbar-nav',
                                'container' => 'ul', // тег контейнера или false, если контейнер не нужен
                                'container_class'   => 'navigation',
                                'items_wrap' => '<ul  class="navbar-nav">%3$s</ul>',
                                'add_li_class'  => 'nav-item'


                            )
                        );
                        ?>
                    </div> <!-- navbar-collapse.// -->
                </div> <!-- container-fluid.// -->
            </nav>
