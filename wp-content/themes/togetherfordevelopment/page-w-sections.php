<?php
/*
 * Template Name: Page w/ Sections
 */
    get_header();
    if (have_posts()):
        while (have_posts()):
            the_post();
            get_template_part('inc/title');
            get_template_part('inc/featured-image');
?>
<section>
    <div class="container content">
        <?php the_content(); ?>
    </div>
<section>
<?php
        endwhile;
    endif;
    get_footer();

