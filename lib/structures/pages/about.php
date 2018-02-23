<?php 
function roboto_do_about_template(){ ?>
	<header id="about-header" style="background-color: #1b2037;">
		<div class="about-header-container">
			<h1 class="about-title">A filipino designer who loves<br/>to turn caffeine into code</h1>
		</div><!-- .about-header-container -->
	</header><!-- #about-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="about-body-container">
				<div class="about-content about-body-block">
					<?php the_content(); ?>
				</div>
				<?php the_post_thumbnail('full',array('class'=>'neil-pic about-body-block')); ?>
			</div><!-- .project-body-container -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<nav id="project-nav" style="display: none;">
		<div class="project-nav-container">
			<ul class="project-nav-list">
				<li class="project-menu-item">
					<a href="#">
						Download Resume
					</a>
				</li>
				<li class="project-menu-item">
					<a href="/home">
						Gallery
					</a>
				</li>
				<li class="project-menu-item">
					<a href="/contact">
						Contact
					</a>
				</li>
			</ul><!-- .project-nav-list -->
		</div><!-- .project-nav-right -->
	</nav><!-- .project-nav -->

	<section id="testimonial">
		<div class="testimonial-container">
			<header>
				<h2 class="testi-title">Happy Clients</h2>
			</header>
			<div id="testimonial-slider">
				<?php 	/**
					 * The WordPress Query class.
					 * @link http://codex.wordpress.org/Function_Reference/WP_Query
					 *
					 */
					$args = array(
						'post_type' => 'testimonial',
						'post_status' => 'publish',
						'posts_per_page' => -1,
					);
				
				$query = new WP_Query( $args );

				if( $query->have_posts() ):
					while( $query->have_posts() ):
						$query->the_post();
				?>
					<blockquote id="testi-<?php the_ID(); ?>" <?php post_class("testi-entry");?> >
						<div class="testi-container">
							<?php the_post_thumbnail('full',array('class'=>' testi-img')); ?>
							<div class="testi-content">
								<?php the_content(); ?>
								<h3><?php the_title();?></h3>
							</div>
						</div><!-- .project-container -->
					</blockquote>
				<?php
					endwhile;
					wp_reset_postdata();
				endif;?>
			</div>
		</div>
	</section>
<?php }






