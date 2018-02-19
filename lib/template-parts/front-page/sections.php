<section id="hero">
	<div class="hero-container container">
		<?php the_field('hero_banner'); ?>
	</div>
</section>

<section id="projects">
	<div class="projects-container">
		<?php
			$args = array(
				'post_type' => 'projects',
				'post_status' => 'publish',
				'posts_per_page' => -1,
			);

			genesis_custom_loop( $args );
		?>
	</div><!-- .projects-container -->
</section><!-- .projects -->