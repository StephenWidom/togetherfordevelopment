<footer>
    <div class="container">
        <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-nav',
                'container'      => ''
            ));
        ?>
            <span class="designer">Website design by <a href="http://stephenwidom.com/" target="_blank">Stephen Widom</a></span>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

