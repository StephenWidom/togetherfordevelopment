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
<section class="home-secondary">
    <div class="container content">
        <?php the_content(); ?>
    </div>
</section>
<?php
    if (function_exists('get_field') && $quotes = get_field('quotes')):
?>
<section class="quotes cf">
<?php
        $no_of_quotes = count($quotes);
        $quote_width = floor(100 / $no_of_quotes);

        foreach ($quotes as $quote):
?>
    <div class="quote w-<?php echo $quote_width; ?>">
        <span><?php echo $quote['quote']; ?></span>
        <span class="author">&ndash; <?php echo $quote['author']; ?></span>
    </div>
<?php
        endforeach;
?>
</section>
<?php
    endif;

        endwhile;
    endif;
    get_footer();

