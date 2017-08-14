<?php
/*
 * TEAM TEMPLATE
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
			the_content();

			// If any team members have been enetered on About page...
			if (function_exists('get_field') && have_rows('team_members')):
		?>
		<div class="leadership">
			<h2>Team Members</h2>
			<?php

				// Loop through each team member...
				while (have_rows('team_members')):
					the_row();
					$image = get_sub_field('image');
			?>
			<div class="member">
                    <a title="<?php echo the_sub_field('name'); ?>" href="<?php echo $image['sizes']['large']; ?>"><img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>"></a>
				    <p class="name"><strong><?php the_sub_field('name'); ?></strong> <?php the_sub_field('title'); ?></p>
                    <div class="member-bio">
				        <?php the_sub_field('bio'); ?>
                    </div>
                <a class="hidden view-more" href="#">View More</a>
			</div>
			<?php
				endwhile;
			?>
		</div>
		<?php
			endif;
		?>
	</div>
</section>
<?php
		endwhile;
	endif;
get_footer();

