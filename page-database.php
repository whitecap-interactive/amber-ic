<?php
/**
 * The template for displaying the main database landing page.
 *
 * @package amber-ic
 */

get_header(); ?>

<div class="database-section">
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
            <!--<div style="width:100%;">
                <div style="display:inline; float: left; width: 45%; background-color:#ccc; height:300px;">test</div>
                <div style="display:inline; float: left; width: 300px; background-color:#cc0000; height:300px;">test</div>
                <div style="display:inline; float: right; width: 45%; background-color:#ccc; height:300px;">test</div>
            </div>-->
            
	<div class="entry-content">
		<?php the_content(); ?>
        <aside id="tribal_column-8" class="widget widget_tribal_column">
			<div class="eq-ht-wrapper clearfix db-full-width">
				<div class="eq-ht col-3 lt-grey orange-bg">
					<a href=" #"> <h3>Member Login</h3></a>
					<?php echo do_shortcode('[user-meta-login]');?>
				</div>	


				<div class="eq-ht col-3 lt-grey purple-bg">
					<a href="/organizations"> <h3>Organizations</h3></a>
                    View tribal organization contact information. Search by organization name, and sort organizations by region or state.
                    <div class="learn-more blue"><a href="/organizations">View Organizations</a></div>
                    
                    <?php 
                        if ( is_user_logged_in() ) { 
                            $user = wp_get_current_user();
                            //echo '$org_name: ' . $org_name;
                            //echo '<br />$user->organization: ' . $user->organization;

                            if ( ( in_array( 'mega_member', (array) $user->roles ) ) || ( in_array( 'member', (array) $user->roles ) ) || ( in_array( 'administrator', (array) $user->roles ) ) ) { ?>

                                <div class="learn-more blue"><a href="/database/submit-a-document">Submit a Document</a></div>
                    
                            <?php } }?>

                    <p>&nbsp;</p>
                    <h3>Looking for a listing of state<br />AMBER Alert Coordinators?</h3>
                    Visit that listing on our AMBER Advocate website<br />(<a href="https://www.amberadvocate.org" target="_blank" style="color:#fff;">www.amberadvocate.org</a>)
                        <div class="learn-more blue"><a href="https://www.amberadvocate.org/amber-alert-network/meet-our-partners/" target="_blank">State AMBER Alert Contact Information</a></div>                            
                    </p>
						
				</div>	



				<div class="eq-ht col-3 lt-grey blue-bg">
					<a href="/database/request-access"> <h3>Request Access</h3></a>
					Request a member account to securely access information and resources related to your tribal organization. Authorized members include those working in tribal leadership, public safety and child protection roles.
                    <div class="learn-more blue"><a href="/database/request-access">New User</a></div>	
				</div>		
			</div> <!-- end eq height wrapper -->   
		</aside>
        
        
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
        
        <!--<div class="body-callout-box row clearfix" style="background:url(http://tribaldatabase.dev/wp-content/uploads/2016/12/database_sunset_banner-e1481584371541.jpg); background-size: cover; background-position: center bottom; border: 0; color:#fff; min-height: 500px;">
            <div class="amber-ic-container">
                <h2>ABOUT THE DATABASE</h2>
                Lorem ipsum dolor sit amet, ea sit autem facilis graecis. Utinam luptatum urbanitas te cum, fabellas nominati neglegentur eu nam. Mel ne modus tation, et vidisse corpora has. An bonorum dolorum cum. In nostro officiis sed. Sea at augue erant recusabo, pri ex quaeque imperdiet intellegam, ad cum amet omnes equidem.    
            </div>
        </div>-->
        
        <div class="body-callout-box light-gray-callout row clearfix" style="background:#866787; color:#fff; font-size: 1.2em; border: 0;">
            <div class="amber-ic-container">
                <div class="callout-description center-align">
                    <h2>QUESTIONS?</h2>
                    For questions about using the site or your existing membership, please use the <a href="/database/request-access" style="color:#fff;">'Contact Us'</a> button.<br />If you wish to request an account, please use the <a href="/database/request-access" style="color:#fff;">‘Request Access’</a> button.
                    <br /><br />
                    <div class="callout-button clearfix">
                        <div class="learn-more blue" style="display:inline;text-align:center;"><a href="/database/contact">Contact Us</a></div> &nbsp; &nbsp; <div class="learn-more blue" style="display:inline;text-align:center;"><a href="/database/request-access">Request Access</a></div>
                    </div>
                </div>
            </div>
        </div> <!-- #questions -->

	</div><!-- .entry-content -->            


			<?php if ( ! dynamic_sidebar( 'sidebar-bottom' ) ) : endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	

</div><!-- #database section -->

<?php get_footer(); ?>
