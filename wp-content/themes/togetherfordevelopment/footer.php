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

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" id="donate">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="lc" value="en_US">
    <input type="hidden" name="hosted_button_id" value="2BMYGK87J77LA">
    <input type="image" src="https://www.paypalobjects.com/en_US/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<?php wp_footer(); ?>
</body>
</html>

