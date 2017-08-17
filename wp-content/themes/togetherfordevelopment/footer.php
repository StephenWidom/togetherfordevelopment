<footer>
    <div class="container">
    <?php
        if (function_exists('get_field') && have_rows('social_media_links', 'option')):
    ?>
        <ul class="soc">
        <?php
            while (have_rows('social_media_links', 'option')):
                the_row();
        ?>
            <li><a href="<?php the_sub_field('link'); ?>" target="_blank"><i class="fa-2x fa fa-<?php the_sub_field('channel'); ?>"></i></a></li>
        <?php
            endwhile;
        ?>
        </ul>
    <?php
        endif;

        wp_nav_menu(array(
            'theme_location' => 'footer-nav',
            'container'      => ''
        ));
    ?>
        <span class="designer">Website by <a href="http://stephenwidom.com/" target="_blank">Stephen Widom</a></span>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

