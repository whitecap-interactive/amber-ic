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

			<hr />

			<div class="flex-container">
				<div class="jump-link">
					<a class="amberic-button" href="#law-enforcement">Law Enforcement</a>
				</div>
				<div class="jump-link">
					<a class="amberic-button" href="#parents-community-members">Parents & Community Members</a>
				</div>
				<div class="jump-link">
					<a class="amberic-button" href="#sex-trafficking-awareness-prevention-response">Sex Trafficking: Awareness, Prevention & Response</a>
				</div>
				<div class="jump-link">
					<a class="amberic-button" href="#youth">Youth</a>
				</div>
				<div class="jump-link">
					<a class="amberic-button" href="#youth-workers-child-advocates">Youth Workers/Child Advocates</a>
				</div>									
			

			<hr />

			<a name="law-enforcement"></a>
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


			<a name="parents-community-members"></a>
			<h2>Parents & Community Members</h2>

			<div class="flex-container">

				<?php // loop for taxonomy in custom post-type
					$argsMine = array(
					   'numberposts' => -1,
					   'orderby' => 'desc',
					   'post_type' => 'amber_resources',
					   'resource_category' => 'parents-community-members',
					   'post_status' => 'publish'
					);
					$postslist = get_posts($argsMine);
					foreach ($postslist as $post) :
					setup_postdata($post);
				?> 
				
				<?php get_template_part( 'template-parts/content', 'resources' ); ?>
			
				<?php endforeach; ?>

			</div>


			<a name="sex-trafficking-awareness-prevention-response"></a>
			<h2>Sex Trafficking: Awareness, Prevention & Response</h2>

			<div class="flex-container">

				<?php // loop for taxonomy in custom post-type
					$argsMine = array(
					   'numberposts' => -1,
					   'orderby' => 'desc',
					   'post_type' => 'amber_resources',
					   'resource_category' => 'sex-trafficking-awareness-prevention-response',
					   'post_status' => 'publish'
					);
					$postslist = get_posts($argsMine);
					foreach ($postslist as $post) :
					setup_postdata($post);
				?> 
				
				<?php get_template_part( 'template-parts/content', 'resources' ); ?>
			
				<?php endforeach; ?>

			</div>


			<a name="youth"></a>
			<h2>Youth</h2>

			<div class="flex-container">

				<?php // loop for taxonomy in custom post-type
					$argsMine = array(
					   'numberposts' => -1,
					   'orderby' => 'desc',
					   'post_type' => 'amber_resources',
					   'resource_category' => 'youth',
					   'post_status' => 'publish'
					);
					$postslist = get_posts($argsMine);
					foreach ($postslist as $post) :
					setup_postdata($post);
				?> 
				
				<?php get_template_part( 'template-parts/content', 'resources' ); ?>
			
				<?php endforeach; ?>

			</div>


			<a name="youth-workers-child-advocates"></a>
			<h2>Youth Workers/Child Advocates</h2>

			<div class="flex-container">

				<?php // loop for taxonomy in custom post-type
					$argsMine = array(
					   'numberposts' => -1,
					   'orderby' => 'desc',
					   'post_type' => 'amber_resources',
					   'resource_category' => 'youth-workers-child-advocates',
					   'post_status' => 'publish'
					);
					$postslist = get_posts($argsMine);
					foreach ($postslist as $post) :
					setup_postdata($post);
				?> 
				
				<?php get_template_part( 'template-parts/content', 'resources' ); ?>
			
				<?php endforeach; ?>

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
