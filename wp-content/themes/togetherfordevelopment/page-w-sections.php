<?php
/*
 * Template Name: Page w/ Sections
 */
    get_header();
    if (have_posts()):
        while (have_posts()):
            the_post();
            get_template_part('inc/title');
?>
<section>
    <div class="container content">
    <?php
        if (function_exists('get_field') && have_rows('sections')):

            while (have_rows('sections')):
                the_row();
    ?>
        <div class="content-section">
        <?php
                if (get_sub_field('section_title')):
        ?>
            <h3 class="section-title"><?php the_sub_field('section_title'); ?></h3>
        <?php
                endif;
                the_sub_field('content');
        ?>
        </div>
    <?php

            endwhile;

        else:
            the_content();
                
        endif;
    ?>
    </div>
<section>
<?php
        endwhile;
    endif;
    get_footer();

