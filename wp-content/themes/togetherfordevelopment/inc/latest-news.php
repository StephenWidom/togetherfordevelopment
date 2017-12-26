<div class="news-item cf">
    <a href="<?php the_permalink(); ?>">
        <?php
                if (has_post_thumbnail()):
                    the_post_thumbnail('thumbnail', array("class" => "hvr-grow"));
                else:
            ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/blog-placeholder.jpg"
                class="hvr-grow" />
            <?php
                endif;
            ?>
    </a>
    <div class="top">
        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <span class="date"><?php the_time('F j, Y'); ?></span>
    </div>
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="more">Read More ></a>
</div>
