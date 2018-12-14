<?php
/**
 * The template for displaying Organizations CPT Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package amber-ic
 */

//GET USER DATA
$post = get_post($_GET[org_id]); 
$org_name = $post->post_name;

$user_fields = array( 
	'meta_query' => array(
	        array(
	            'key'   => 'organization',
	            'value' => $org_name,
	            'compare' => 'REGEXP'
	        )
	    )
	);
$user_query = new WP_User_Query( $user_fields );
	
get_header(); ?>


<div class="page-container">
	<section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">


        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">AMBER Alert in Indian Country Network</h1>
            </header><!-- .entry-header -->

            <p>View tribal organization contact information. Search by organization name, and sort organizations by region or state.</p>

            
            <div class="details-header">
                <h3><span class="dashicons dashicons-admin-site dash-large"></span> All Organizations<!-- &nbsp; &#187;--></h3>
            </div>
            <div class="network-table-container">
                <table id="organization-table" class="organization-list">
                    <tr>
                        <th><input type="text" id="organization-name-search" onkeyup="orgSearch('name')" placeholder="Search for Organization Name" title="Type in a name"></th>
                        <th>
                            <select id="organization-region-search" onchange="orgSearch('region')">
                                <option value="">Select a Region</option>
                                <option value="alaska">Alaska</option>
                                <option value="eastern oklahoma">Eastern Oklahoma</option>
                                <option value="eastern">Eastern</option>
                                <option value="great plains">Great Plains</option>
                                <option value="midwest">Midwest</option>
                                <option value="navajo">Navajo</option>
                                <option value="northwest">Northwest</option>
                                <option value="pacific">Pacific</option>
                                <option value="rocky mountain">Rocky Mountain</option>
                                <option value="southern plains">Southern Plains</option>
                                <option value="southwest">Southwest</option>
                                <option value="western">Western</option>
                            </select>
                        </th>
                        <th>
                            <select id="organization-state-search" onchange="orgSearch('state')">
                                <option value="">Select a State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>	                                          
                        </th>
                    </tr>


                  <?php

                    // set up our archive arguments
                    $archive_args = array(
                        post_type => 'organization',    // get only posts
                        'posts_per_page'=> -1,   // this will display all posts on one page
                        'orderby' => 'title',
                        'order'   => 'ASC',
                    );

                    // new instance of WP_Quert
                    $archive_query = new WP_Query( $archive_args );

                  ?>

                <?php /* Start the Loop */ ?>
                <?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); // run the custom loop ?>

                    <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', 'organization-list' );
                    ?>

                <?php endwhile; ?>
                </table>

            </div>

            <div class="details-header">
                <!-- &nbsp; &#187;-->
            </div>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>

        </main><!-- #main -->
    </section><!-- #primary -->

</div><!-- #page container -->	
  
    

<?php get_footer(); ?>

   