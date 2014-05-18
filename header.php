<!DOCTYPE html>
<html>
    <head>
        <title><?php wp_title('|', 'true', 'right'); bloginfo('title'); ?></title>
        <meta name="resource-type" content="document" />
        <?php echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n"; ?>
        <meta name="author" content="Luke Lee" />
        <meta name="contact" content="lukelee@oh-naturalhealth.com" />
        <meta name="copyright" content="Copyright (c) 2014 Luke Lee. All Rights Reserved." />
        <meta name="keywords" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/skeleton.css">
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png" type="image/x-icon" />
        <?php wp_head(); ?>        
    </head>
    <body>
        <div class="container">
            <header class="sixteen columns row">
                <div class="four columns logo">
                    <a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" title="<?php bloginfo('title'); ?>"></a>
                </div>
                <div class="nav-bar twelve columns" id="show-nav"><a href="#">New Cheng Menu</a></div>
                <div class="nav-bar twelve columns" id="close-nav"><a href="#">X</a></div>
                <div class="twelve columns nav-bar">
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'container_class' => 'main-nav', 'container' => 'nav')); ?>
                </div>
            </header>
