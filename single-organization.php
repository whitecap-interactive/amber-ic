<?php
/**
 * The Template for displaying all single posts.
 *
 * @package amber-ic
 */

get_header(); ?>


    <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">    
    
			<div class="amber-ic-container">
				<?php if ( ! dynamic_sidebar( 'sidebar-above-columns' ) ) : endif; ?>
                
                <?php if ( ! dynamic_sidebar( 'sidebar-top' ) ) : endif; ?>

				<?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'template-parts/content', 'organization' ); ?>

                    <?php /* tribaldb_post_nav(); */ ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						//if ( comments_open() || '0' != get_comments_number() ) :
						//	comments_template();
						//endif;
					?>

				<?php endwhile; // end of the loop. ?>
			</div><!-- #ten twenty four -->	
            
            <div class="body-callout-box light-gray-callout row clearfix" style="background:#866787; color:#fff; font-size: 1.2em; border: 0;">
                <div class="amber-ic-container">
                    <div class="callout-description center-align">
                        <h2>QUESTIONS?</h2>
                        For questions about using the site or your existing membership, please use the <a href="/network/request-access" style="color:#fff;">'Contact Us'</a> button.<br />If you wish to request an account, please use the <a href="/network/request-access" style="color:#fff;">‘Request Access’</a> button.
                        <br /><br />
                        <div class="callout-button clearfix">
                            <div class="learn-more blue" style="display:inline;text-align:center;"><a href="/network/contact">Contact Us</a></div> &nbsp; &nbsp; <div class="learn-more blue" style="display:inline;text-align:center;"><a href="/network/request-access">Request Access</a></div>
                        </div>
                    </div>
                </div>
            </div> <!-- #questions -->           

			<?php if ( ! dynamic_sidebar( 'sidebar-bottom' ) ) : endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	


<?php get_footer(); ?>