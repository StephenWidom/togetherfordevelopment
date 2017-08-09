<?php
    if (has_post_thumbnail()):
?>
<div class="page-title">
    <div class="container">
        <?php the_post_thumbnail('page'); ?>
        <h1 class="title"><?php the_title(); ?></h1>
    </div>
</div>
<?php
    else:
?>
<h1 class="title"><?php the_title(); ?></h1>
<?php
    endif;

