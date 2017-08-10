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
<section>
    <div class="container content">
        <?php the_content(); ?>
    </div>
<section>
<?php
        endwhile;
    endif;
    get_footer();

