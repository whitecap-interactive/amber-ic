<?php
/**
 * @package amber-ic
 */

    //GET USER DATA
    
    $post = get_post($_GET[org_id]); 
    $org_name = $post->post_name;

    //get users that are a members of current organization page. 
    $user_fields = array( 
        'meta_query' => array(
                array(
                    'key'   => 'organization',
                    'value' => $org_name,
                    'compare' => '='
                ),
            )
        );
    $user_query = new WP_User_Query( $user_fields );


    //get all inactive/pending users from user_meta table 
    global $userMeta;
    $inactive_user_ids = get_users( array(
    'meta_key'=>'user_meta_user_status',
    'meta_value'=>'inactive' 
    ));
    $pending_user_ids = get_users( array(
    'meta_key'=>'user_meta_user_status',
    'meta_value'=>'pending' 
    ));
    $hide_user_ids = array_unique(array_merge($inactive_user_ids,$pending_user_ids), SORT_REGULAR);
    
    $inactive_ids = array();
    foreach($hide_user_ids as $value) {
     $inactive_ids[] = $value->ID;
    }
    /*echo '<pre>';
    var_dump($inactive_ids);
    echo '</pre>';*/
?>
<style type="text/css">
    .white-center-callout{
        font-weight:bold;
        margin-top:2em;
        margin-bottom:2em;
    }
    .org-details-container .white-center-callout a{
        color:#EF4305 !important;
    }
    .org-details-container .white-center-callout a:hover{
        color:#c53603 !important;
    }
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <!-- SEARCH BAR -->
                
        <aside style="width: 75%; display:inline; float: left;" id="" class="">
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

            <p>&nbsp;</p>

        </aside>
                         
        <div class="profile-links">
            <?php if ( is_user_logged_in() ) {
                $user = wp_get_current_user(); ?>


                <h3><?php echo 'Welcome, ' . $user->first_name; ?>!</h3>
                <?php 
                    if ( in_array( 'administrator', (array) $user->roles ) ) {
                        echo '(Administrator)';
                    }
                    elseif ( in_array( 'mega_member', (array) $user->roles ) ) {
                        echo '(Mega Member)';
                    }
                    elseif ( in_array( 'member', (array) $user->roles ) ) {
                        echo '(Member)';
                    }
                ?> 
                <br /><a href="/network/profile">Profile</a> | <a href="<?php echo wp_logout_url( $redirect ); ?>">Logout</a>

                <br clear="all" />
            <?php } 
            else {
                echo '<h3>Welcome, Guest!</h3>';
                echo '<a href="/wp-admin">Sign In</a> | <a href="/network/request-access">Request Access</a>';
            } ?>
        </div>    <br clear="all" />    
        <h2 class="page-title"><?php the_title(); ?><!-- <span class="back-to-link"> &nbsp; | <a href="/organizations">Back to Organizations &#187;</a></span>--></h2>
    </header><!-- .entry-header -->

    <div class="entry-content">
        
        <?php the_content(); ?>

    </div><!-- .entry-content -->    
    
    <div class="org-details-container row loop-padding">
        <div class="col-sm-8 orange-bg detail-height">
            <div class="col-sm-6">
                <h3>Organization Details</h3>
                <?php echo rwmb_meta('tribal_address_1') ?><br />
                <?php if ( !empty( rwmb_meta('tribal_address_2') ) ) { echo '<a href="' . rwmb_meta('tribal_address_2') . '</a><br />'; } ?>
                <?php echo rwmb_meta('tribal_city') ?>, <?php echo rwmb_meta('tribal_state') ?>, <?php echo rwmb_meta('tribal_zip') ?><br />
                <p>Primary phone: <?php echo rwmb_meta('tribal_primary_phone') ?><br />
                <?php if ( !empty( rwmb_meta('tribal_secondary_phone') ) ) { echo 'Secondary Phone: ' . rwmb_meta('tribal_secondary_phone') . '<br />'; } ?>
                <?php if ( !empty( rwmb_meta('tribal_fax') ) ) { echo 'Fax: ' . rwmb_meta('tribal_fax'); } ?></p>
                <?php if ( !empty( rwmb_meta('tribal_website') ) ) { echo '<a href="' . rwmb_meta('tribal_website') . '">Website</a>'; } ?>
            </div>
            <div class="col-sm-6">
                <h3>Region:</h3>
                
                <?php echo rwmb_meta('tribal_region') ?>
<!--
                <h3>Primary Contact:</h3>
                <?php foreach ( $user_query->results as $user ) {
                    if (in_array("member", $user->roles) && in_array("organization_admin", $user->roles)) {
                        echo $user->display_name . '<br /><a href="mailto:' . $user->user_email . '">' . $user->user_email . '</a></p>';
                    }
                } ?>
-->
            </div>
        </div>
        <div class="col-sm-4 blue-bg detail-height">
            <h3><span class="dashicons dashicons-admin-links dash-large"></span> Database Links</h3>
            <div class="menu-temporary-database-menu-container">
                <ul id="menu-temporary-database-menu" class="menu">
                    <li class="menu-item"><a href="/network/">Database Portal</a></li>
                    <li class="menu-item"><a href="/organizations">Organizations</a></li>
                    <li class="menu-item"><a href="/network/contact/">Contact Us</a></li>
                    <li class="menu-item"><a href="/network/request-access/">Request Access</a></li>
                    <li class="menu-item"><a href="/network/submit-a-document/">Submit a Document</a></li>
                    <li class="menu-item"><a href="/network/profile">Update Profile</a></li>
                </ul>
            </div>
            <!--<div class="learn-more blue" style="text-align:left;padding-left:39px;"><a href="/wp-admin/profile">Update Profile</a></div>-->
        </div>
        <br clear="all" />
        <div class="col-sm-8 col-sm-offset-2 white-center-callout">
            Do you have updated information or corrections for this Tribal Organization's contact information? Please share them with us using the <a href="<?php echo get_site_url(); ?>/network/contact/">Contact Us</a> form. 
        </div>
        <br clear="all" />
        <?php 
            if ( is_user_logged_in() ) { 

                $current_user = wp_get_current_user();

                // DISPLAY ORG DETAIL DATA FOR TESTING
                //echo '$org_name: ' . $org_name;
                //echo '<br />$current_user->organization: ' . $current_user->organization;

                // START MEMBERS CONDITIONAL

                if ( ( in_array( 'mega_member', (array) $user->roles ) ) || ( in_array( 'member', (array) $user->roles ) ) || ( $current_user->organization == $org_name ) || ( in_array( 'administrator', (array) $user->roles ) ) ) { ?>
        
                    <div class="details-header">
                        <h3><span class="dashicons dashicons-groups dash-large"></span> Member Directory<!-- &nbsp; &#187;--></h3>
                    </div>

                    <div class="loop-padding">
            
                        <table class="organization-list">
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>

                            <?php

                            // User Loop
                            if ( ! empty( $user_query->results ) ) {

                                foreach ( $user_query->results as $user ) {
                                    //dont list inactive/pending users
                                    if (in_array($user->ID, $inactive_ids)) {
                                        //do nothing
                                    }else{
                                        echo '<tr><td><span class="dashicons dashicons-universal-access dash-large"></span> <a href="/member-profile?usr_id=' . $user->ID . '">'. $user->display_name .'</a></td><td>'. $user->job_title .'</td><td>'. $user->user_email .'</td><td>'. $user->phone .'</td></tr>';
                                    }

                                }
                            } 
                            else {
                                echo '<tr><td colspan="4">No members found.</td></tr>';
                            }
                        ?>

                        </table> 
                        
                    </div> 
                    
                <?php } 

                // START DOCUMENTS CONDITIONAL

                $current_user = wp_get_current_user();                

                if ( ( in_array( 'mega_member', (array) $current_user->roles ) ) || ( in_array( 'administrator', (array) $current_user->roles ) ) || ( $current_user->organization == $org_name )  ) { ?>

                    <div class="details-header">
                        <h3><span class="dashicons dashicons-paperclip dash-large"></span> Documents<!-- &nbsp; &#187;--><span class="float-right"><span class="dashicons dashicons-welcome-add-page dash-large"></span> <a href="/network/submit-a-document">Submit a Document &#187;</a></span></h3>
                    </div>
            
                    <div class="loop-padding">

                        <table class="organization-list">
                            <tr>
                                <th>File name</th>
                            </tr>
                            <?php
                                $tribal_files = rwmb_meta('tribal_file_advanced');
                                //var_dump($tribal_files);
                                if ( !empty( $tribal_files ) ) {
                                    foreach ( $tribal_files as $tribal_file ) {
                                        echo "<tr><td><span class='dashicons dashicons-media-document dash-medium'></span> <a href='{$tribal_file['url']}' title='{$tribal_file['title']}' target='_blank'>{$tribal_file['title']}</a></td></tr>";
                                    }
                                } else {
                                    echo '<tr><td>No documents found.</td></tr>';
                                }
                            ?>
                        </table>
                    </div> 

                <?php } else { ?>

                    <div class="details-header loop-padding">
                        <h3><span class="dashicons dashicons-paperclip dash-large"></span> Documents <!--&nbsp; &#187;--></h3>
                    </div>
                    <div class="amber-ic-container">
                        <p>You must be assigned to this organization to view it’s documents.</p>
                    </div>

                <?php } 

                // START GLOBAL DOCS SECTION

                $settings = get_option( 'tribaldb' );
                $field_id = 'global_doc';
                $global_doc_ids = $settings[$field_id];

                if ( !empty( $global_doc_ids ) ) {        
    
                    echo '<div class="details-header"><h3><span class="dashicons dashicons-info dash-large"></span> Information & Resources</h3></div>';
                    echo '<div class="loop-padding">';
                    echo '<table class="organization-list">';

                    foreach ( $global_doc_ids as $global_doc_id ) {

                        $document = RWMB_File_Field::file_info( $global_doc_id );
                        //var_dump($document);

                        echo "<tr><td><span class='dashicons dashicons-media-document dash-medium'></span> <a href='{$document['url']}' title='{$document['title']}' target='_blank'>{$document['title']}</a></td></tr>";
                    }
                    
                    echo '</table>';
                    echo '</div>';
    
                }               

            } else { ?>
        
            <div class="details-header loop-padding">
                <h3>Members Only <!--&nbsp; &#187;--></h3>
            </div>
            <div class="amber-ic-container">
                <p>You must be logged in to view the complete member directory and document repository. Please <a href="/network" style="color:#866787!important">login here</a>.</p>
            </div>
        
        <?php } ?>   
               
    </div>
    
        
    <footer class="entry-footer">
        <?php
            /* translators: used between list items, there is a space after the comma 
            $category_list = get_the_category_list( __( ', ', 'tribaldb' ) );

            /* translators: used between list items, there is a space after the comma 
            $tag_list = get_the_tag_list( '', __( ', ', 'tribaldb' ) );

            if ( ! tribaldb_categorized_blog() ) {
                // This blog only has 1 category so we just need to worry about tags in the meta text
                if ( '' != $tag_list ) {
                    $meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'tribaldb' );
                } else {
                    $meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'tribaldb' );
                }

            } else {
                // But this blog has loads of categories so we should probably display them here
                if ( '' != $tag_list ) {
                    $meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'tribaldb' );
                } else {
                    $meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'tribaldb' );
                }

            } // end check for categories on this blog

            printf(
                $meta_text,
                $category_list,
                $tag_list,
                get_permalink()
            ); */
        ?>

        <?php edit_post_link( __( 'Edit', 'tribaldb' ), '<span class="edit-link">', '</span>' ); ?>

    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
