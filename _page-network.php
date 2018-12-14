<?php
/**
 * The template for displaying the main AMBER-IC Network landing page.
 *
 * @package amber-ic
 */

get_header(); ?>


	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
            
	<div class="entry-content">
		<?php the_content(); ?>

		<!-- SEARCH BAR -->
		<div class="amber-ic-container" style="margin: 30px auto;">
            <aside style="width: 100%;" id="" class="">
                <form role="search" method="get" class="search-form" action="/">
                    <label>
                        <!--<span class="screen-reader-text">
                            <p><strong>Search The Tribal Directory</strong></p>
                        </span>-->
                        <input type="search" class="search-field" placeholder="Search the Tribal Database" value="" name="s" title="Search the Tribal Database" />
                    </label>
                    <input type="submit" class="search-submit" value="Search" />
                    <input type="hidden" name="post_type" value="organization" />
                </form>
                
                <p>Search topics or key words. Searches will return organization contact information if viewing as a public user.</p>
                <p>If logged in as a member, returns will also include member contact, document and resource information.</p>
                
            </aside>
        </div>
        
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

	</div><!-- .entry-content -->            


		</main><!-- #main -->
	</div><!-- #primary -->
	

<?php get_footer(); ?>
