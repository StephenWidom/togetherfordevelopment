<?php
    get_header();
    get_template_part('inc/title');
?>
<section>
    <div class="container content">
        <?php
            if (have_posts()):
        ?>
            <div class="latest-news cf">
            <?php
                while (have_posts()):
                    the_post();
                    get_template_part('inc/latest-news');
                endwhile;
            ?>
            </div>
            <div class="nav-previous alignleft"><?php next_posts_link('Older posts'); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link('Newer posts'); ?></div>
        <?php
            else:
                get_template_part('inc/no-results');

            endif;
        ?>
    </div>
</section>
<?php
    get_footer();

