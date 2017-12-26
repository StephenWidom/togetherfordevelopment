<?php
if (
    is_category() ||
    !has_post_thumbnail() ||
    (function_exists('get_field') && in_category('blog') && !get_field('top_image'))
):

?>
<h1 class="title">
    <?php
        if (is_category()) {
            echo single_cat_title();
        } else {
            the_title();
        }
    ?>
</h1>
<?php
    else:
?>
<div class="page-title">
    <div class="container">
        <?php the_post_thumbnail('page'); ?>
        <h1 class="title"><?php the_title(); ?></h1>
    </div>
</div>
<?php
    endif;

