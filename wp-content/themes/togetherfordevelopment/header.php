<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="container">
            <div class="logo">
                <a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/uwc_logo_resized.png"/></a>
            </div>
            <nav>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-nav-menu',
                        'container'      => ''
                    ));
                ?>
            </nav>
        </div>
    </header>

