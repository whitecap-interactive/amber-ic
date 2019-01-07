<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amber-ic
 */

get_header(); ?>

<div class="resources-container">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">Resource Downloads & Links</h1>					
				</header><!-- .page-header -->

				<h2>Law Enforcement</h2>

				<div class="flex-container">

					<?php // loop for taxonomy in custom post-type
						$argsMine = array(
						   'numberposts' => -1,
						   'orderby' => 'desc',
						   'post_type' => 'amber_resources',
						   'resource_category' => 'law-enforcement',
						   'post_status' => 'publish'
						);
						$postslist = get_posts($argsMine);
						foreach ($postslist as $post) :
						setup_postdata($post);
					?> 
					
					<?php get_template_part( 'template-parts/content', 'resources' ); ?>
				
					<?php endforeach; ?>

				</div>

				<hr />

				<h2>Parents & Community Members</h2>

				<div class="flex-container">
					
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'resources' );

					endwhile;

					the_posts_navigation();

					?>

				</div>	
					
			<?php					

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- #archive container -->

<?php
get_footer();
