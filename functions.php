<?php
/**
 * StagDining functions and definitions
 *
 * @package StagDining
 * @since StagDining 1.6
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since StagDining 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'StagDining_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since StagDining 1.0
 */
function StagDining_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Custom Theme Options
	 */
	require( get_template_directory() . '/inc/theme-options/theme-options.php' );


add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->term_id}.php") ) return TEMPLATEPATH . "/single-{$cat->term_id}.php"; } return $t;' ));


/**
* Find an event and replace the calendar day link
*/
function cptc_calendar_day_link( $url, $year, $month, $day ) {
# Filter post types here
#if ( !is_post_type_archive( 'events' ) )
# return $url;

$day_event = get_posts( array(
    'post_type' => 'events',
    'day' => $day,
    'monthnum' => $month,
    'year' => $year
) );

$myposts = count($day_event);

if ($myposts == 1) {
    $day_event_url = get_post_permalink( reset( $day_event ) );
} else {
	$day_event_url = site_url() . "/events/" . $year . "/" . $month . "/" . $day;
}

if ( $day_event_url )
    return $day_event_url;
return $url;
}
add_filter( 'day_link', 'cptc_calendar_day_link', 10, 4 );

/**
* Find an event and replace the calendar month link
*/
function cptc_calendar_month_link( $url, $year, $month ) {
return add_query_arg( 'm', $year . zeroise( $month, 2 ), get_post_type_archive_link( 'events' ) );
}
add_filter( 'month_link', 'cptc_calendar_month_link', 10, 3 );

    /**
     * Add ACF add-ons
     */

add_action('acf/register_fields', 'my_register_fields');

function my_register_fields()
{
    include_once('acf-date_time_picker/acf-date_time_picker.php');
}

register_field('Location_field', dirname(__FILE__) . '/location.php');
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'StagDining', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	// Enable post thumbnails940, 400
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'StagDining-blog-thumbnail', 664, 170, true );
    add_image_size( 'StagDining-better-blog-thumbnail', 664, 270, true );
    add_image_size( 'client-logo', 125, 125 );
	add_image_size( 'StagDining-featured-thumbnail', 500, 362, true );
	add_image_size( 'StagDining-featured', 960, 362, true );
	add_image_size( 'StagDining-small-thumbnail', 300, 191, true );
	add_image_size( 'portfolio-img', 330, 490, false );
    add_image_size( 'StagDining-wide-event-thumbnail', 330, 150, true );    
	add_image_size( 'StagDining-portfolio-thumbnail', 280, 207, true );
	add_image_size( 'StagDining-single', 664, 450, true );
	add_image_size( 'StagDining-single-full', 920, 450, true );
	add_image_size( 'small-thumbnail', 213, 100, true );


	add_editor_style();
	
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'StagDining' ),
	) );

	/**
	 * Add support for the Image, Gallery, and Video post formats
	 */
	add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', ) );
}
endif; // StagDining_setup
add_action( 'after_setup_theme', 'StagDining_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * Hooks into the after_setup_theme action.
 *
 * @since StagDining 1.0.1
 */
$args = array(
	'default-color' => 'ffffff',
);
add_theme_support( 'custom-background', $args );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since StagDining 1.0
 */
function StagDining_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'StagDining' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="side-widget widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Left', 'StagDining' ),
		'id' => 'footer-widgets-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s contact-widget">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );


	register_sidebar( array(
		'name' => __( 'Footer Middle', 'StagDining' ),
		'id' => 'footer-widgets-middle',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Footer Right', 'StagDining' ),
		'id' => 'footer-widgets-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
    register_sidebar( array(
		'name' => __( 'Derby', 'StagDining' ),
		'id' => 'sidebar-derby',
		'before_widget' => '<aside id="%1$s" class="side-widget widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
    
        register_sidebar( array(
		'name' => __( 'Derby Footer Left', 'StagDining' ),
		'id' => 'footer-stag-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s contact-widget">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );


	register_sidebar( array(
		'name' => __( 'Derby Footer Middle', 'StagDining' ),
		'id' => 'footer-stag-middle',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Derby Footer Right', 'StagDining' ),
		'id' => 'footer-stag-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
		register_sidebar( array(
		'name' => __( 'Services Sidebar', 'StagDining' ),
		'id' => 'sidebar-services',
		'before_widget' => '<aside id="%1$s" class="side-widget widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
    
}
add_action( 'widgets_init', 'StagDining_widgets_init' );



/*========================================================================
* Description: Define Reviews custom post type
*=========================================================================*/

if (!class_exists('Reviews')) {
  class Reviews {
    static function on_load() {
      add_action('init',array(__CLASS__,'init'));
      
      add_action('wp_insert_post_data',array(__CLASS__,'wp_insert_post_data'),10,2);
    }
    static function init() {
      $labels = array(
    	'name' => _x('Press Reviews', 'post type general name'),
		'singular_name' => _x('Review', 'post type singular name'),
		'add_new' => _x('Add New', 'Review'),
		'add_new_item' => __('Add New Review'),
		'edit_item' => __('Edit Review'),
		'new_item' => __('New Review'),
		'view_item' => __('View Review'),
		'search_items' => __('Search Review'),
		'not_found' =>  __('No Review found'),
		'not_found_in_trash' => __('No Review found in Trash'),
		'parent_item_colon' => ''
	  );
      register_post_type( 'review',array(
        'labels' =>$labels,
        'public' => true,
        'show_ui' => true,
        'menu_position' => 9,
        'capability_type' => 'page',
        'hierarchical' => false,
        'rewrite' => true,
		'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'thumbnail','page-attributes'),
        'has_archive' => true
      ));
	  
	  register_taxonomy( 'review-category', 'review', array ('hierarchical' => false, 'label' => __('Review Categories')));  
	  
	 
    }
   

    static function wp_insert_post_data($data,$postarr) {
      if ($postarr['post_type'] == 'review') {
		
      }
      return $data;
    }
  }
  Reviews::on_load();
}


/**
 * if lt IE 9
 */
function StagDining_head(){
?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
}
add_action( 'wp_head', 'StagDining_head');

/**
 * Enqueue scripts and styles
 */
function StagDining_scripts() {
	global $post;

	

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_page_template( 'page-home.php' ) || is_page_template( 'page-home-alt.php' ) ) {

wp_enqueue_script( 'jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.min.js', array( 'jquery' ), '20120419', true );

wp_enqueue_script( 'StagDining-theme', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), '20120419', true );	
	
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'StagDining_scripts' );


/*========================================================================
* Description: Define Events custom post type

*=========================================================================*/

if (!class_exists('Events')) {
  class Events {
    static function on_load() {
      add_action('init',array(__CLASS__,'init'));
      add_action('wp_insert_post_data',array(__CLASS__,'wp_insert_post_data'),10,2);
    }
    static function init() {
      $labels = array(
        'name' => _x('Events', 'post type general name'),
    	'singular_name' => _x('Events', 'post type singular name'),
		'add_new' => _x('Add New', 'Event'),
		'add_new_item' => __('Add New Event'),
		'edit_item' => __('Edit Event'),
		'new_item' => __('New Event'),
		'view_item' => __('View Event'),
		'search_items' => __('Search Events'),
		'not_found' =>  __('No Events found'),
		'not_found_in_trash' => __('No Events found in Trash'),
		'parent_item_colon' => ''
	  );
      register_post_type( 'events',array(
        'labels' =>$labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'thumbnail','page-attributes', 'revisions'),
        'has_archive' => true
      ));
      
	 
      }
    

    static function wp_insert_post_data($data,$postarr) {
      if ($postarr['post_type'] == 'events') {
		
      }
      return $data;
    }
  }
  Events::on_load();
}

/*========================================================================
* Description: Define Portfolio custom post type

*=========================================================================*/

if (!class_exists('Portfolio')) {
  class Portfolio {
    static function on_load() {
      add_action('init',array(__CLASS__,'init'));
      add_action('wp_insert_post_data',array(__CLASS__,'wp_insert_post_data'),10,2);
    }
    static function init() {
      $labels = array(
        'name' => _x('Porftfolio', 'post type general name'),
    	'singular_name' => _x('Porftfolio item', 'post type singular name'),
		'add_new' => _x('Add New', 'Porftfolio item'),
		'add_new_item' => __('Add New Porftfolio item'),
		'edit_item' => __('Edit Porftfolio item'),
		'new_item' => __('New Porftfolio item'),
		'view_item' => __('View Porftfolio item'),
		'search_items' => __('Search Porftfolio items'),
		'not_found' =>  __('No Porftfolio items found'),
		'not_found_in_trash' => __('No Porftfolio items found in Trash'),
		'parent_item_colon' => ''
	  );
      register_post_type( 'portfolio',array(
        'labels' =>$labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'thumbnail','page-attributes', 'revisions'),
        'has_archive' => true
      ));
      
	 
      }
    

    static function wp_insert_post_data($data,$postarr) {
      if ($postarr['post_type'] == 'portfolio') {
		
      }
      return $data;
    }
  }
  Portfolio::on_load();
}





function StagDining_get_featured_posts( $ids = false ) {
	static $featured_ids = array();

	if ( $ids )
		return $featured_ids;

	$sticky = get_option( 'sticky_posts' );
	if ( empty( $sticky ) )
		return array();

	$featured_query = new WP_Query;
	$featured_posts = $featured_query->query( array(
		'post__in'            => $sticky,
		'posts_per_page'      => 10,
		'no_found_rows'       => true,
		'ignore_sticky_posts' => 1
	) );

	if ( ! $featured_posts )
		return array();

	global $post;
	$featured = array();
	foreach ( (array) $featured_posts as $post ) {
		setup_postdata( $post );

		// Featured posts are required to have a featured image.
		if ( '' == get_the_post_thumbnail() )
			continue;

		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'StagDining-featured-thumbnail' );

		if ( ! isset( $image[1] ) )
			continue;

		if ( 500 > $image[1] )
			continue;

		$featured[] = $post;
	}

	wp_reset_postdata();

	$featured_ids = wp_list_pluck( $featured, 'ID' );

	return $featured;
}

add_action('wp_ajax_my_action', 'my_action_callback');
add_action('wp_ajax_nopriv_my_action', 'my_action_callback');

function my_action_callback() {
	global $wpdb; // this is how you get access to the database

	$category = $_POST['category'];
	$tag = $_POST['tag'];
	
//	echo '[justified_image_grid image_categories="' . $category . '" image_tags="' . $tag . '"]';
	echo do_shortcode('[justified_image_grid image_categories="' . $category . '" image_tags="' . $tag . '"]');
	echo '<script>func1();</script>';

	die(); // this is required to return a proper result
}

/*========================================================================
* Description: Custom Excerpt Length

*=========================================================================*/


function custom_excerpt($new_length = 20, $new_more = '...') {
  add_filter('excerpt_length', function () use ($new_length) {
    return $new_length;
  }, 999);
  add_filter('excerpt_more', function () use ($new_more) {
    return $new_more;
  });
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

/*========================================================================
* Description: Multiple Featured Images

*=========================================================================*/

if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'featured-image-2',
                'post_type' => 'page',      // Set this to post or page
                'labels' => array(
                    'name'      => 'Featured image 2',
                    'set'       => 'Set featured image 2',
                    'remove'    => 'Remove featured image 2',
                    'use'       => 'Use as featured image 2',
                )
        );

        new kdMultipleFeaturedImages( $args );
}

/*========================================================================
* Description: Better NextGen Tags

*=========================================================================*/

function ng_tag_cloud( $args = '' ) {
    $defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
		'exclude' => '', 'include' => '', 'link' => 'view', 'taxonomy' => 'post_tag', 'echo' => true
	);
	$args = wp_parse_args( $args, $defaults );
 
	$tags = get_terms( $args['taxonomy'], array_merge( $args, array( 'orderby' => 'count', 'order' => 'DESC' ) ) ); // Always query top tags
 
	if ( empty( $tags ) )
		return;
 
	foreach ( $tags as $key => $tag ) {
		if ( 'edit' == $args['link'] )
			$link = get_edit_tag_link( $tag->term_id, $args['taxonomy'] );
		else
			$link = get_term_link( intval($tag->term_id), $args['taxonomy'] );
		if ( is_wp_error( $link ) )
			return false;
 
		$tags[ $key ]->link = $link;
		$tags[ $key ]->id = $tag->term_id;
	}
 
	$return = ng_generate_tag_cloud( $tags, $args ); // Here's where those top tags get sorted according to $args
 
	$return = apply_filters( 'wp_tag_cloud', $return, $args );
 
	if ( 'array' == $args['format'] || empty($args['echo']) )
		return $return;
 
	echo $return;
}
 
function ng_taglist()
{
global $wpdb;
$tp = "dswp_";

$tag_list = (array)$wpdb->get_results("
			SELECT {$tp}terms.term_id as tag_ID,
				{$tp}terms.name as tag_name,
				{$tp}ngg_pictures.pid as pid
			FROM {$tp}terms, {$tp}term_taxonomy, {$tp}term_relationships, {$tp}ngg_pictures
			WHERE {$tp}term_taxonomy.taxonomy = 'ngg_tag'
			AND {$tp}term_taxonomy.term_id = {$tp}terms.term_id
			AND {$tp}term_taxonomy.term_taxonomy_id = {$tp}term_relationships.term_taxonomy_id
			AND {$tp}term_relationships.object_id = {$tp}ngg_pictures.pid
			AND {$tp}terms.name='Dinners'
			
			GROUP BY pid
			ORDER BY pid
		");
		echo count($tag_list)."<br/>";
		foreach($tag_list as $tag){
			echo $tag->pid."<br/>";
		}
		
		return $tag_list;
}
function ng_generate_tag_cloud( $tags, $args = '' ) {
	global $wp_rewrite;
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 0,
		'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
		'topic_count_text_callback' => 'default_topic_count_text',
		'topic_count_scale_callback' => 'default_topic_count_scale', 'filter' => 1,
	);
 
	if ( !isset( $args['topic_count_text_callback'] ) && isset( $args['single_text'] ) && isset( $args['multiple_text'] ) ) {
		$body = 'return sprintf (
			_n(' . var_export($args['single_text'], true) . ', ' . var_export($args['multiple_text'], true) . ', $count),
			number_format_i18n( $count ));';
		$args['topic_count_text_callback'] = create_function('$count', $body);
	}
 
	$args = wp_parse_args( $args, $defaults );
	extract( $args );
 
	if ( empty( $tags ) )
		return;
 
	$tags_sorted = apply_filters( 'tag_cloud_sort', $tags, $args );
	if ( $tags_sorted != $tags  ) { // the tags have been sorted by a plugin
		$tags = $tags_sorted;
		unset($tags_sorted);
	} else {
		if ( 'RAND' == $order ) {
			shuffle($tags);
		} else {
			// SQL cannot save you; this is a second (potentially different) sort on a subset of data.
			if ( 'name' == $orderby )
				uasort( $tags, create_function('$a, $b', 'return strnatcasecmp($a->name, $b->name);') );
			else
				uasort( $tags, create_function('$a, $b', 'return ($a->count > $b->count);') );
 
			if ( 'DESC' == $order )
				$tags = array_reverse( $tags, true );
		}
	}
 
	if ( $number > 0 )
		$tags = array_slice($tags, 0, $number);
 
	$counts = array();
	$real_counts = array(); // For the alt tag
	foreach ( (array) $tags as $key => $tag ) {
		$real_counts[ $key ] = $tag->count;
		$counts[ $key ] = $topic_count_scale_callback($tag->count);
	}
    $homeurl = home_url();
	$min_count = min( $counts );
	$spread = max( $counts ) - $min_count;
	if ( $spread <= 0 )
		$spread = 1;
	$font_spread = $largest - $smallest;
	if ( $font_spread < 0 )
		$font_spread = 1;
	$font_step = $font_spread / $spread;
 
	$a = array();
 
	foreach ( $tags as $key => $tag ) {
		$count = $counts[ $key ];
		$real_count = $real_counts[ $key ];
		$tag_link = '$homeurl/gallery';
		$tag_id = isset($tags[ $key ]->id) ? $tags[ $key ]->id : $key;
		$tag_name = $tags[ $key ]->name;
		$a[] = "<a href='$tag_link?gallerytag=$tag_name' class='tag-link-$tag_id' title='" . esc_attr( $topic_count_text_callback( $real_count ) ) . "' style='font-size: " .
			( $smallest + ( ( $count - $min_count ) * $font_step ) )
			. "$unit;'>$tag_name</a>";
	}
 
	switch ( $format ) :
	case 'array' :
		$return =& $a;
		break;
	case 'list' :
		$return = "<ul class='wp-tag-cloud'>\n\t<li>";
		$return .= join( "</li>\n\t<li>", $a );
		$return .= "</li>\n</ul>\n";
		break;
	default :
		$return = join( $separator, $a );
		break;
	endswitch;
 
    if ( $filter )
		return apply_filters( 'ng_generate_tag_cloud', $return, $tags, $args );
    else
		return $return;
}

function custom_css() {

	   echo '<style type="text/css">
			   #toplevel_page_wck-page{}
                  #cpt_info_box, #customcontactforms-admin .rate-me, 
                  #customcontactforms-admin form.blog-horizontal-form,
                  #customcontactforms-admin .genesis, #customcontactforms-admin .gravity
                  {display: none;}
			 </style>';

}

add_action('admin_head', 'custom_css');

function eventgrid() {
  return '
<div class="event-grid">
<div class="event-grid-img">
<a  href="../../images/wedding.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../../images/wedding.jpg" />
Weddings
</a></div>
<div class="event-grid-img">
<a  href="../../images/wine.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../../images/wine.jpg" />
Winemaker Dinners
</a></div><div class="event-grid-img">
<a href="../../images/underground.jpg"  rel="prettyPhoto gallery[1]">
<img alt="" src="../../images/underground.jpg" />
<span>Underground Dining</span>
</a></div><div class="event-grid-img">
<a href="../../images/brewmaster.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../../images/brewmaster.jpg" />
Brewmaster Dinner
</a></div><div class="event-grid-img">
<a href="../../images/corporate.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../../images/corporate.jpg" />
Corporate Catering
</a></div><div class="event-grid-img">
<a href="../../images/social.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../../images/social.jpg" />
Social Action Events
</a></div><div class="event-grid-img">
<a href="../../images/cocktail.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../../images/cocktail.jpg" />
Cocktail Parties
</a></div><div class="event-grid-img">
<a href="../../images/concert.jpg"  rel="prettyPhoto gallery[1]">
<img alt="" src="../../images/concert.jpg" />
Festivals
</a></div><div class="event-grid-img">
<a href="../../images/street.jpg"  rel="prettyPhoto gallery[1]">
<img alt="" src="../../images/street.jpg" />
Street Food
</a></div><div class="event-grid-img">
<a href="../../images/team.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../../images/team.jpg" />
<span>Team Building Events</span>
</a></div>
</div>';
}
add_shortcode('photogrid', 'eventgrid');

function musicgrid() {
  return '
<div class="event-grid">
<div class="event-grid-img"><a  href="../images/blacc.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../images/blacc.jpg" />Aloe Blacc</a></div>
<div class="event-grid-img"><a href="../images/exile.jpg"  rel="prettyPhoto gallery[1]">
<img alt="" src="../images/exile.jpg" />
<span>Exile</span></a></div>
<div class="event-grid-img"><a href="../images/mayer.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../images/mayer.jpg" />Mayer Hawthorne</a></div>
<div class="event-grid-img"><a  href="../images/shes.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../images/shes.jpg" />The Shes</a></div>
<div class="event-grid-img"><a href="../images/cut.jpg"  rel="prettyPhoto gallery[1]">
<img alt="" src="../images/cut.jpg" />
<span>Cut Chemist</span></a></div>
<div class="event-grid-img"><a href="../images/socialstudies.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../images/socialstudies.jpg" />Social Studies</a></div>
<div class="event-grid-img"><a href="../images/reggie.jpg"  rel="prettyPhoto gallery[1]">
<img alt="" src="../images/reggie.jpg" />
Reggie Watts</a></div><div class="event-grid-img"><a href="../images/melted.jpg"  rel="prettyPhoto gallery[1]">
<img alt="" src="../images/melted.jpg" />Melted Toys</a></div>
<div class="event-grid-img"><a href="../images/softwhites.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../images/softwhites.jpg" />
<span>The Soft White Sixties</span></a></div>
</div>';
}
add_shortcode('musicgrid', 'musicgrid');

function artistgrid() {
  return '
<div class="event-grid">
<div class="event-grid-img"><a href="../images/reyes.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../images/reyes.jpg" />Victor Reyes</a></div>
<div class="event-grid-img"><a href="../images/novy.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../images/novy.jpg" />Jeremy Novy Koi</a></div>
<div class="event-grid-img"><a href="../images/kasia.jpg" rel="prettyPhoto gallery[1]">
<img alt="" src="../images/kasia.jpg" /><span>Kasia Severaid</span></a></div></div>';
}
add_shortcode('artistgrid', 'artistgrid');
