<?php
/**
 * amber-ic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package amber-ic
 */

if ( ! function_exists( 'amber_ic_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function amber_ic_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on amber-ic, use a find and replace
		 * to change 'amber-ic' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'amber-ic', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'amber-ic' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'amber_ic_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'amber_ic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function amber_ic_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'amber_ic_content_width', 640 );
}
add_action( 'after_setup_theme', 'amber_ic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function amber_ic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'amber-ic' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'amber-ic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'amber_ic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function amber_ic_scripts() {
	wp_enqueue_style( 'amber-ic-style', get_stylesheet_uri() );

	wp_enqueue_script( 'amber-ic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'amber-ic-global', get_template_directory_uri() . '/js/amber-ic.js', array(), '20181215', true );

	wp_enqueue_script( 'amber-ic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'amber_ic_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
* Add custom post types.
*/

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'organization',
		array(
			'labels' => array(
				'name' => __( 'Organizations' ),
				'singular_name' => __( 'Organization' )
			),
		'public' => true,
		'has_archive' => true,
		'capability_type' => 'post',
		'rewrite' => array('slug' => 'organizations'),  
		'supports' => array(
            'title',
            'excerpt',
            'editor',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author'),
        'taxonomies' => array('category', 'post_tag'),
        /*'show_in_nav_menus' => true*/
		)
	);
} 

add_action( 'init', 'create_resources' );
function create_resources() {
	register_post_type( 'amber_resources',
		array(
			'labels' => array(
				'name' => __( 'Resources' ),
				'singular_name' => __( 'Resource' )
			),
		'public' => true,
		'has_archive' => true,
		'capability_type' => 'post',
		'rewrite' => array('slug' => 'amber-resources'),  
		'supports' => array(
            'title',
            'excerpt',
            'editor',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author'),
        'taxonomies' => array('resource_category'),
        /*'show_in_nav_menus' => true*/
		)
	);
} 


/**
 * AMBER-IC META BOXES
 */
add_filter( 'rwmb_meta_boxes', 'amberic_register_meta_boxes' );
function amberic_register_meta_boxes( $meta_boxes ) {
    
    
    $prefix = 'amberic_';
    
    // META BOXES FOR RESOURCES CUSTOM POST TYPE
    $meta_boxes[] = array(
        'title'      => __( 'Resource Details', $prefix ),
        'post_types' => 'amber_resources',
        'fields'     => array(
			// TEXT
			array(
				'name' => __( 'External Resource URL', $prefix ),
				'id'   => "{$prefix}url",
				'type' => 'text',
			),
            // TEXT
			array(
				'name' => __( 'Additional External Resource URL', $prefix ),
				'id'   => "{$prefix}url2",
				'type' => 'text',
			),
            // FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'PDF Resource', $prefix ),
				'id'               => "{$prefix}pdf",
				'type'             => 'file_advanced',
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),			
        )
    );


    // ALLOW ATTACHMENT OF FILES TO ORGANIZATION CUSTOM POST TYPE
    $meta_boxes[] = array(
        'title'      => __( 'Assessments & Attached Files', 'tribal' ),
        'post_types' => 'organization',
        'fields'     => array(
            // FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Upload', 'tribal' ),
				'id'               => "{$prefix}file_advanced",
				'type'             => 'file_advanced',
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
        )
    );
    return $meta_boxes;
}

function resources_taxonomy_init() {

	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Resource Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Resource Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Resource Categories' ),
		'all_items'         => __( 'All Resource Categories' ),
		'parent_item'       => __( 'Primary Resource Category' ),
		'parent_item_colon' => __( 'Primary Resource Categories' ),
		'edit_item'         => __( 'Edit Resource Categories' ),
		'update_item'       => __( 'Update Resource Categories' ),
		'add_new_item'      => __( 'Add New Resource Categories' ),
		'new_item_name'     => __( 'New Resource Categories Name' ),
		'menu_name'         => __( 'Resource Categories' ),
	);
	// create a new taxonomy
	register_taxonomy(
		'resource_category',
		'amber_resources',
		array(
			//'rewrite' => array( 'slug' => 'resources-tax' ),
			'hierarchical'      => true,
			'labels' => $labels,
			'show_ui'           => true,
    		'show_admin_column' => true,
    		'query_var'         => true,
		)
	);
}
add_action( 'init', 'resources_taxonomy_init' );



/**
 * META BOXES
 */
add_filter( 'rwmb_meta_boxes', 'tribal_register_meta_boxes' );
function tribal_register_meta_boxes( $meta_boxes ) {
    
    
    // Get the users to display in the Admin Contact select box
    $tribalusers = get_users( 'blog_id=1&orderby=nicename&role=member' );
    // Array of WP_User objects.
    $tribal_admin = array();    
    foreach ( $tribalusers as $tribaluser ) $tribal_admin[$tribaluser->user_nicename] = $tribaluser->user_firstname . ' ' . $tribaluser->user_lastname;  
    
    
    $prefix = 'tribal_';
    // Add Meta Boxes For Attached Documents (note: this applies to all images, pdfs, doc, and excel files)
    $meta_boxes[] = array(
        'id'         => 'personal',
        'title'      => __( 'Document Details', 'tribal' ),
        'post_types' => array( 'attachment' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
			// HEADLINE TEXT
			array(
				'name' => __( 'File Name', 'tribal' ),
				'id'   => "{$prefix}textarea1",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 1,
			),
			// SUBHEAD TEXT
			array(
				'name' => __( 'Submitted By', 'tribal' ),
				'id'   => "{$prefix}textarea2",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 1,
			),
			// DESCRIPTION TEXT
			array(
				'name' => __( 'Submittion Date', 'tribal' ),
				'id'   => "{$prefix}textarea3",
				'type' => 'date',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'your-prefix' ),
					'dateFormat'      => __( 'yy-mm-dd', 'your-prefix' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
        )
    );
    // META BOXES FOR ORGANIZATION CUSTOM POST TYPE
    $meta_boxes[] = array(
        'title'      => __( 'Organization Details', 'tribal' ),
        'post_types' => 'organization',
        'fields'     => array(
			// TEXT
			//array(
			//	'name'  => esc_html__( 'Full Organization Name', $prefix ),
				// Field ID, i.e. the meta key
			//	'id'    => "{$prefix}full_name",
			//	'type'  => 'text',
            //    'attributes' => array(
            //        'size' => '50',
            //    ),
			//),
			// SELECT ADVANCED BOX
//			array(
//				'name'        => __( 'Administrative Contact', $prefix ),
//				'id'          => "{$prefix}admin_contact",
//				'type'        => 'select_advanced',
//				// Array of 'value' => 'Label' pairs for select box
//				'options'     => $tribal_admin,
//				// Select multiple values, optional. Default is false.
//				'multiple'    => false,
//				// 'std'         => 'value2', // Default value, optional
//				'placeholder' => __( 'Select a User', $prefix ),
//                //'after'       => $pruser->user_nicename,
//                'clone'       => false,
//			),
			// TEXT
			array(
				'name' => __( 'Primary Phone', $prefix ),
				'id'   => "{$prefix}primary_phone",
				'type' => 'text',
			),
			// TEXT
			array(
				'name' => __( 'Secondary Phone', $prefix ),
				'id'   => "{$prefix}secondary_phone",
				'type' => 'text',
			),
			// TEXT
			array(
				'name' => __( 'Fax', $prefix ),
				'id'   => "{$prefix}fax",
				'type' => 'text',
			),
			// SELECT BOX
			array(
				'name'        => esc_html__( 'Region', $prefix ),
				'id'          => "{$prefix}region",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'Alaska' => esc_html__( 'Alaska', $prefix ),
                    'Eastern' => esc_html__( 'Eastern', $prefix ),
                    'Eastern Oklahoma' => esc_html__( 'Eastern Oklahoma', $prefix ),
                    'Great Plains' => esc_html__( 'Great Plains', $prefix ),
                    'Midwest' => esc_html__( 'Midwest', $prefix ),
                    'Navajo' => esc_html__( 'Navajo', $prefix ),
                    'Northwest' => esc_html__( 'Northwest', $prefix ),
                    'Pacific' => esc_html__( 'Pacific', $prefix ),
					'Southern Plains' => esc_html__( 'Southern Plains', $prefix ),
					'Southwest' => esc_html__( 'Southwest', $prefix ),
					'Rocky Mountain' => esc_html__( 'Rocky Mountain', $prefix ),
                    'Western' => esc_html__( 'Western', $prefix ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'placeholder' => esc_html__( 'Select a Region', $prefix ),
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Address 1', $prefix ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}address_1",
				'type'  => 'text',
                'attributes' => array(
                    'size' => '50',
                ),
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Address 2', $prefix ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}address_2",
				'type'  => 'text',
                'attributes' => array(
                    'size' => '50',
                ),
			),
			// TEXT
			array(
				'name'  => esc_html__( 'City', $prefix ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}city",
				'type'  => 'text',
			),
			// SELECT BOX
			array(
				'name'        => esc_html__( 'State', $prefix ),
				'id'          => "{$prefix}state",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'AL' => esc_html__( 'Alabama', $prefix ),
                    'AK' => esc_html__( 'Alaska', $prefix ),
                    'AZ' => esc_html__( 'Arizona', $prefix ),
                    'AR' => esc_html__( 'Arkansas', $prefix ),
                    'CA' => esc_html__( 'California', $prefix ),
                    'CO' => esc_html__( 'Colorado', $prefix ),
                    'CT' => esc_html__( 'Connecticut', $prefix ),
                    'DE' => esc_html__( 'Delaware', $prefix ),
                    'DC' => esc_html__( 'District Of Columbia', $prefix ),
                    'FL' => esc_html__( 'Florida', $prefix ),
                    'GA' => esc_html__( 'Georgia', $prefix ),
                    'HI' => esc_html__( 'Hawaii', $prefix ),
                    'ID' => esc_html__( 'Idaho', $prefix ),
                    'IL' => esc_html__( 'Illinois', $prefix ),
                    'IN' => esc_html__( 'Indiana', $prefix ),
                    'IA' => esc_html__( 'Iowa', $prefix ),
                    'KS' => esc_html__( 'Kansas', $prefix ),
                    'KY' => esc_html__( 'Kentucky', $prefix ),
                    'LA' => esc_html__( 'Louisiana', $prefix ),
                    'ME' => esc_html__( 'Maine', $prefix ),
                    'MD' => esc_html__( 'Maryland', $prefix ),
                    'MA' => esc_html__( 'Massachusetts', $prefix ),
                    'MI' => esc_html__( 'Michigan', $prefix ),
                    'MN' => esc_html__( 'Minnesota', $prefix ),
                    'MS' => esc_html__( 'Mississippi', $prefix ),
                    'MO' => esc_html__( 'Missouri', $prefix ),
                    'MT' => esc_html__( 'Montana', $prefix ),
                    'NE' => esc_html__( 'Nebraska', $prefix ),
                    'NV' => esc_html__( 'Nevada', $prefix ),
                    'NH' => esc_html__( 'New Hampshire', $prefix ),
                    'NJ' => esc_html__( 'New Jersey', $prefix ),
                    'NM' => esc_html__( 'New Mexico', $prefix ),
                    'NY' => esc_html__( 'New York', $prefix ),
                    'NC' => esc_html__( 'North Carolina', $prefix ),
                    'ND' => esc_html__( 'North Dakota', $prefix ),
                    'OH' => esc_html__( 'Ohio', $prefix ),
                    'OK' => esc_html__( 'Oklahoma', $prefix ),
                    'OR' => esc_html__( 'Oregon', $prefix ),
                    'PA' => esc_html__( 'Pennsylvania', $prefix ),
                    'RI' => esc_html__( 'Rhode Island', $prefix ),
                    'SC' => esc_html__( 'South Carolina', $prefix ),
                    'SD' => esc_html__( 'South Dakota', $prefix ),
                    'TN' => esc_html__( 'Tennessee', $prefix ),
                    'TX' => esc_html__( 'Texas', $prefix ),
                    'UT' => esc_html__( 'Utah', $prefix ),
                    'VT' => esc_html__( 'Vermont', $prefix ),
                    'VA' => esc_html__( 'Virginia', $prefix ),
                    'WA' => esc_html__( 'Washington', $prefix ),
                    'WV' => esc_html__( 'West Virginia', $prefix ),
                    'WI' => esc_html__( 'Wisconsin', $prefix ),
                    'WY' => esc_html__( 'Wyoming', $prefix ),                    
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'placeholder' => esc_html__( 'Select a State', $prefix ),
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Zip', $prefix ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}zip",
				'type'  => 'text',
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Website', $prefix ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}website",
				'type'  => 'text',
			),
        )
    );
    // ALLOW ATTACHMENT OF FILES TO ORGANIZATION CUSTOM POST TYPE
    $meta_boxes[] = array(
        'title'      => __( 'Assessments & Attached Files', 'tribal' ),
        'post_types' => 'organization',
        'fields'     => array(
            // FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Upload', 'tribal' ),
				'id'               => "{$prefix}file_advanced",
				'type'             => 'file_advanced',
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
        )
    );
    return $meta_boxes;
}

//ADD DROPDOWN TO USER PROFILE THAT DISPLAYS ORGANIZATIONS
add_filter( 'user_meta_field_config', 'user_meta_field_config_populate_categories', 10, 3 );
function user_meta_field_config_populate_categories( $field, $fieldID, $formName){ 
	//get list of organizations
 	/*$args = array(
		'posts_per_page'   => -1,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'title',
		'order'            => 'ASC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'organization',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'	   => '',
		'author_name'	   => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);*/
	$args = array(
		'posts_per_page'   => -1,
		'offset'           => 0,
		'orderby'          => 'title',
		'order'            => 'ASC',
		'post_type'        => 'organization',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$posts_array = get_posts( $args );

    if( $fieldID != '15') // This has to match the Field ID of the User Meta Dropdown
        return $field;
 	
    $output = null;
    $output .= 'other=Other,';
    foreach( $posts_array as $post ):
        $output .= $post->ID.'='.$post->post_name.',';
    endforeach;
    $output = ',' . trim( $output, ',' );
 
    $field['options'] = $output;
 
    return $field;
}	

//List of admin email notification recipients
function changeUMPAdminEmail( $adminEmails ) {
    return array( 'david@whitecap.io' );
}
add_filter( 'user_meta_admin_email_recipient', 'changeUMPAdminEmail' );	



add_filter( 'mb_settings_pages', 'global_docs_page' );
function global_docs_page( $settings_pages )
{
	$settings_pages[] = array(
		'id'          => 'tribaldb',
		'option_name' => 'tribaldb',
		'menu_title'  => __( 'Information & Resources', 'tribaldb' ),
		//'parent'      => 'themes.php',
	);
	return $settings_pages;
}

add_filter( 'rwmb_meta_boxes', 'global_docs_meta_boxes' );
function global_docs_meta_boxes( $meta_boxes )
{
    $meta_boxes[] = array(
        'id'         => 'global-docs',
        'title'      => __( 'Information and Resources Documents', 'tribaldb' ),
        'settings_pages' => 'tribaldb',
		'icon_url'      => 'dashicons-admin-page',
        'fields'     => array(
            // FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Upload', 'tribal' ),
				'id'               => "global_doc",
				'type'             => 'file_advanced',
				//'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
        )
    );    
    
	return $meta_boxes;
}


add_filter( 'getarchives_where', 'wse95776_archives_by_cat', 10, 2 );
/**
 * Filter the posts by category slug
 * @param $where
 * @param $r
 *
 * @return string
 */
function wse95776_archives_by_cat( $where, $r ){
    return "WHERE wp_tribal_posts.post_type = 'post' AND wp_tribal_posts.post_status = 'publish' AND wp_tribal_terms.slug = 'tribal-connections' AND wp_tribal_term_taxonomy.taxonomy = 'category'";
}

add_filter( 'getarchives_join', 'wse95776_archives_join', 10, 2 );

/**
 * Defines the necessary joins to query the terms
 * @param $join
 * @param $r
 *
 * @return string
 */
function wse95776_archives_join( $join, $r ){
    return 'inner join wp_tribal_term_relationships on wp_tribal_posts.ID = wp_tribal_term_relationships.object_id inner join wp_tribal_term_taxonomy on wp_tribal_term_relationships.term_taxonomy_id = wp_tribal_term_taxonomy.term_taxonomy_id inner join wp_tribal_terms on wp_tribal_term_taxonomy.term_id = wp_tribal_terms.term_id';
}



add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});
