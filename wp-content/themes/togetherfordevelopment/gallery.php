<?php /*
Template Name: Gallery
*/ get_header();
    if (have_posts()):
        while (have_posts()):
            the_post();
            get_template_part('inc/title');
?>
<section>
    <div class="container content">
    <?php
        the_content();

        if (function_exists('get_field') && $images = get_field('gallery')):
    ?>
        <ul class="gallery">
        <?php
            foreach ($images as $image):
        ?>
            <li><a title="<?php echo $image['caption']; ?>" rel="gallery" href="<?php echo $image['url']; ?>" class="hvr-grow fancybox"><img src="<?php echo $image['sizes']['thumbnail']; ?>" /></a></li>
        <?php
            endforeach;
        ?>
        </ul>
    <?php
        endif;
    ?>
    </div>
<section>
<?php
        endwhile;
    endif;
get_footer();

