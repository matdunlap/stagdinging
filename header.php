<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package StagDining
 * @since StagDining 1.6
 */
?><!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'StagDining' ), max( $paged, $page ) );

	?></title>
    
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />    
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/instafollow.js"></script>
     <script src="<?php bloginfo('template_url'); ?>/js/main-2.js"></script>

     <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.js?v=2.1.5"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/masonry.pkgd.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.css?v=2.1.5" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/circle.css" media="screen" />    



<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43912493-1', 'stagdining.com');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>
<?php if ( is_page_template('page-videogallery.php') ) { ?>
  	<script>
            jQuery(document).ready(function($) {
			var isMobile = navigator.userAgent.match(/Mobile/i) != null;
            if (isMobile) {
            $(".lightbox").attr("class", "");
            $(".gallery").attr("class", "");
            $(".fancybox").attr("class", "");
            $(".jig-loaded").attr("class", "vid-link");
            }
            });
            </script>
<?php } else { ?>
   	<script>
            jQuery(document).ready(function($) {
			var isMobile = navigator.userAgent.match(/Mobile/i) != null;
            if (isMobile) {
            $(".lightbox").attr("class", "fancybox");
            $(".gallery").attr("class", "");
            }
            });
            </script>
<?php } ?>
	<?php do_action( 'before' ); ?>
   
<div class="tip-top-icons"><div class="icon-container">
<a href="https://www.facebook.com/stagdining" class="social-icon" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/facebook.jpg"></a>
<a href="https://twitter.com/stagdining" class="social-icon" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/twitter2.jpg"></a>
<a href="http://instagram.com/stagdining" class="social-icon" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/instagram.jpg"></a>
<a href="http://stagdining.tumblr.com/" class="social-icon" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/tumblr.jpg"></a>
<a href="http://www.youtube.com/stagdining" class="social-icon" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/youtube.jpg"></a>
</div> </div>  <div class="clearfix"></div> 
<div id="main-wrapper">
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrapper">
			<hgroup>
				<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			
			</hgroup>
			

			<nav role="navigation" class="site-navigation main-navigation">
				<h1 class="assistive-text"><?php _e( 'Menu', 'StagDining' ); ?><img src="<?php bloginfo('template_url'); ?>/images/dropdown.png" class="dropdown-icon"></h1>
				<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'StagDining' ); ?>"><?php _e( 'Skip to content', 'StagDining' ); ?></a></div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>


		</div><!-- .header-wrapper -->
	</header><!-- .site-header -->


		<?php // Loads homepage templates and slider selection
		if ( is_page_template( 'page-home.php' ) || is_page_template( 'page-home-alt.php' )  ) : ?>

		<?php get_template_part( 'featured-content' ); ?>

		<?php else : ?>
		<section class="title-wrapper">
				<?php if(is_front_page()) { ?>
				<h1 class="entry-title">Latest News</h1>
			
				<?php } elseif ( is_tag() ) { ?>
				<h1 class="entry-title"><?php printf( __( 'Tag Archives: %s', 'StagDining' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
				<?php } elseif ( is_search() ) { ?>
				<h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'StagDining' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php } ?>
		</section><!-- .entry-header -->
		<?php endif ?>
		
		
	<div id="page" class="hfeed site clear-fix">
	<div id="main">