<?php
include  'modules/theme/class-style.php';
new \NIX_Lessions\Modules\Theme_style\Theme_style();

include  'modules/theme/class-theme.php';
new \NIX_Lessions\Modules\Theme\Theme();

include 'modules/theme/class-menu.php';
new \NIX_Lessions\Modules\Menu\Menu();

include 'modules/theme/class-costompost.php';
new NIX_Lessions\Modules\CostomPost\CostomPost();

include 'modules/theme/class-blocks.php';
new \NIX_Lessions\Modules\Blocks\Blocks();

include 'modules/theme/class-option.php';
new \NIX_Lessions\Modules\Acf_options\Acf_options();

include 'inc/acf-config.php';
