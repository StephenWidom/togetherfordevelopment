<?php
    get_header();
    if (have_posts()):
        while (have_posts()):
            the_post();
            
            if (function_exists('get_field') and $slides = get_field('slider')):
?>
<script>
var slider = [];
            <?php
                foreach ($slides as $slide):
            ?>
            slider.push('<?php echo $slide['url']; ?>');

            <?php
                endforeach;
            ?>
</script>
        <?php
            endif;
        ?>
<div class="home-primary">
        <?php
            if (function_exists('get_field') && get_field('slider_text')):
        ?>
    <div class="container">
        <h1><?php the_field('slider_text'); ?></h1>
    </div>
        <?php
            endif;
        ?>
</div>
<section>
    <div class="container content">
        <?php the_content(); ?>
    </div>
<section>
<?php
        endwhile;
    endif;
    get_footer();

