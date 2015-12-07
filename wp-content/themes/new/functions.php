<?php
/**
 * NEW functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NEW
 */

if ( ! function_exists( 'new_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function new_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on NEW, use a find and replace
	 * to change 'new' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'new', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-thumbnails', array('post','vehicles') );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'new' ),
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
	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'new_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif; // new_setup
add_action( 'after_setup_theme', 'new_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function new_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'new_content_width', 640 );
}
add_action( 'after_setup_theme', 'new_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function new_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'new' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => '',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</aside>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'new_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function new_scripts() {

	wp_enqueue_script( 'new-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script('new-fonts', "https://use.typekit.net/och4sol.js", true);

	wp_enqueue_script('new-fonts-try', get_template_directory_uri() . '/js/fonts-try.js', array('new-fonts'), true);

	wp_enqueue_script( 'new-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_register_style('bootstrap', get_template_directory_uri() . "/style/bootstrap.css" );

	wp_register_style('new-style', get_stylesheet_uri(), array('bootstrap'));

	wp_enqueue_style('new-style', get_stylesheet_uri() );

	if (is_tax('vehicles_categories')) {
		wp_enqueue_script( 'new-product-spec', get_template_directory_uri() . '/js/product-spec.js', array('jquery'), true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'new_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Register Custom Post Types & Taxonomies for vehicles
 */
function product_taxonomy() {
    register_taxonomy(
        'vehicles_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'vehicles',        //post type name
        array(
            'hierarchical' => true,
            'label' => 'Vehicles Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'vehicles', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'product_taxonomy');

add_action('init', 'products_init');
function products_init() {
	$labels = array(
		'name'               => _x( 'vehicles', 'post type general name' ),
		'singular_name'      => _x( 'Vehicle', 'post type singular name' ),
		'menu_name'          => _x( 'Vehicles', 'admin menu' ),
		'name_admin_bar'     => _x( 'Vehicles', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'vehicle'),
		'add_new_item'       => __( 'Add New Vehicle'),
		'new_item'           => __( 'New Vehicle'),
		'edit_item'          => __( 'Edit Vehicle'),
		'view_item'          => __( 'View Vehicle'),
		'all_items'          => __( 'All Vehicles'),
		'search_items'       => __( 'Search Vehicles'),
		'parent_item_colon'  => __( 'Parent Vehicles:'),
		'not_found'          => __( 'No Vehicles found.'),
		'not_found_in_trash' => __( 'No Vehicles found in Trash.')
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'taxonomies'		 => array('vehicles_categories'),
		'rewrite'            => array( 'slug' => 'vehicles' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'vehicles', $args );
}

/**
 * Register Custom Post Types & Taxonomies for locations
 */
function location_taxonomy() {
    register_taxonomy(
        'locations_regions',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'locations',        //post type name
        array(
            'hierarchical' => true,
            'label' => 'Locations Regions',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'locations', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'location_taxonomy');

add_action('init', 'location_init');
function location_init() {
	$labels = array(
		'name'               => _x( 'locations', 'post type general name' ),
		'singular_name'      => _x( 'Location', 'post type singular name' ),
		'menu_name'          => _x( 'Locations', 'admin menu' ),
		'name_admin_bar'     => _x( 'Locations', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'location'),
		'add_new_item'       => __( 'Add New Location'),
		'new_item'           => __( 'New Location'),
		'edit_item'          => __( 'Edit Location'),
		'view_item'          => __( 'View Location'),
		'all_items'          => __( 'All Locations'),
		'search_items'       => __( 'Search Locations'),
		'parent_item_colon'  => __( 'Parent Locations:'),
		'not_found'          => __( 'No locations found.'),
		'not_found_in_trash' => __( 'No locations found in Trash.')
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'taxonomies'		 => array('locations_regions'),
		'rewrite'            => array( 'slug' => 'locations' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'locations', $args );
}

/*
*Register any scripts
*/

/*
* Number generator function
*/
function number_generator($trans) {
	$number = 0;
	if (is_int(trans)) {
		$numbers = array("zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twevle", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen", "twenty", "thirty", "fourty", "fifty", "sixty", "seventy", "eighty", "ninety", "one hundred");
		switch ($trans) {
			case 'value':
				# code...
				break;

			default:
				# code...
				break;
		}
		return $trans;
	} else {
		return $trans;
	}
}
add_filter('after_setup_theme', 'number_generator');

/*
*Table of specs function
*/
function table_of_specs($q) {
	if (function_exists('get_field')) {
		$specs = array();
		$total = $q->found_posts;

		for ($z = 0; $z < $q->found_posts; $z++) {
			$id = $q->posts[$z]->ID;
			$specs[] = get_field_object('vehicle_engine', $id);
			$specs[] = get_field_object('vehicle_gvwr', $id);
			$specs[] = get_field_object('vehicle_drive', $id);
			$specs[] = get_field_object('vehicle_wheelbase', $id);
			$specs[] = get_field_object('vehicle_length', $id);
			$specs[] = get_field_object('vehicle_height', $id);
			$specs[] = get_field_object('vehicle_interior_height', $id);
			$specs[] = get_field_object('vehicle_interior_width', $id);
		}

		if ($total < 10) { // this solution might get unwieldy past 10 products

			$count = sizeof($specs);

			$html = '<div class="features-container">';
			$html .= '<div class="features features-list"><button>Compare</button></div>';
			$html .= '<div class="feature features-table">';
			$html .= '<table>';
			$rows = "";

			for ($i = 0; $i < $count; $i++) {
				$rows .= "<tr>";

					for ($x = 0; $x < $total + 1; $x++) {

							if ($total == 2) { // if product count is totaling 2
								if ($x == 0) {
									$rows .= "<td>" . $specs[$i]["value"] . "</td>";
								} else if ($x == 1) {
									$rows .= "<td>" . $specs[$i]["label"] . "</td>";
								} else {
									$rows .= "<td>" . $specs[$i + ($count/2)]["value"] . "</td>";
								}
							}
							elseif ($total > 0) { // for all other product displays
								if ($x == 0) {
									$rows .= "<td>" . $specs[$i]["label"] . "</td>";
								} else if ($x == 1) {
									$rows .= "<td>" . $specs[$i]["value"] . "</td>";
								} else {
									$rows .= "<td>" . $specs[$i + ($count/2)]["value"] . "</td>";
								}
							}
					}

				$rows .= "</tr>";

			}
			$html .= $rows;
			$html .= '</table>';
			$html .= '</div><!-- features-table -->';
			$html .= '</div><!-- .features-container -->';

			return $html;
		}
	}
}
add_filter('after_setup_theme', 'table_of_specs');
