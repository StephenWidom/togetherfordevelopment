<?php
    get_header();
    if (have_posts()):
        while (have_posts()):
            the_post();
?>
<section>
    <div class="container content">
        <article>
            <div>
                <a class="date" href="<?php the_permalink(); ?>"><?php the_time('l, F j, Y'); ?></a>
                <?php
                    the_post_thumbnail('max-width');
                ?>
                <div class="note">
                <?php
                    the_content();
                ?>
                </div>
                <?php
                    previous_post_link('%link');
                ?>
            </div>
        </article>
    </div>
<section>
<?php
        endwhile;
    endif;
    get_footer();

