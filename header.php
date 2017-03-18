<!DOCTYPE html>
<html>

<head>
    <title>Applied Research and Innovation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"></head>

    <?php wp_head(); ?>
    <body>
        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
            <?php wp_nav_menu(array('theme_location' == 'primary')); ?>
            <?php wp_nav_menu( array('menu' => 'Sub Menu')); ?>
        </nav>



