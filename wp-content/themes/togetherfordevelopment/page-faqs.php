<?php
/*
 * FAQS TEMPLATE
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
			if (function_exists('get_field') && have_rows('faqs')):

        ?>
        <div class="faq">
        <?php
                
				// Loop through each team member...
				while (have_rows('faqs')):
					the_row();
			?>
            <dd><?php the_sub_field('question'); ?></dd>
            <dt><?php the_sub_field('answer'); ?></dt>
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

