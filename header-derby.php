<?php
/**
 * The Header the Derby Page
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
<title>Derby Cocktail Co. | Stag Dining</title>


<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-derby.css" type="text/css" media="screen" />    
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600|Dancing+Script|Stint+Ultra+Expanded&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,900|Gravitas+One|Oswald:400,700|Open+Sans:400,800,700' rel='stylesheet' type='text/css'>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/instafollow.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/circle.css" media="screen" />  
         <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.css?v=2.1.5" media="screen" />
           <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/masonry.pkgd.min.js"></script>
   
     <script type="text/javascript">
        $(document).ready(function() {
			$('.fancybox').fancybox();	
		});
	</script>
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
<div class="header">
                <a href="http://stagdining.com" target="_blank">
                    <span class="top-bar-title">Stag Dining Group</span>
                </a>
             <!--    <span class="right">
                 

<div class="mail-title">Mailing List:</div> <div id="mc_embed_signup">
<form action="http://battleshipsf.us2.list-manage1.com/subscribe/post?u=b7194ed698bafb9a33260696b&amp;id=f41337a5cc" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
    <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"  target="_blank"><i class="icon-arrow-right icon-large"></i></button>
</form>
</div>

                 
                </span>-->
                <div class="clr"></div>
            </div>
	<?php do_action( 'before' ); ?>
<div id="main-wrapper">
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrapper">
			<hgroup>
				<a href="http://stagdining.com/derby-cocktail-co"><img src="<?php bloginfo('template_url'); ?>/images/stag-icon.png" class="stag-icon"></a><h1 class="site-title"><a href="http://stagdining.com/derby-cocktail-co">Derby Cocktail Co.</a></h1>
			
			</hgroup>
			

		</div><!-- .header-wrapper -->
	</header><!-- .site-header -->


		<?php // Loads homepage templates and slider selection
		if ( is_page_template( 'page-home.php' ) || is_page_template( 'page-home-alt.php' )  ) : ?>

		<?php get_template_part( 'featured-content' ); ?>

		<?php else : ?>
		<section class="title-wrapper">
				<?php if(is_front_page()) { ?>
				<h1 class="entry-title">Latest News</h1>
				<?php } elseif (  is_category() ) { ?>
				<h1 class="entry-title"><?php printf( __( 'Category Archives: %s', 'StagDining' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
				<?php } elseif ( is_tag() ) { ?>
				<h1 class="entry-title"><?php printf( __( 'Tag Archives: %s', 'StagDining' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
				<?php } elseif ( is_search() ) { ?>
				<h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'StagDining' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php } elseif ( is_404() ) { ?>
				<h1 class="entry-title">Oops! That page can&rsquo;t be found.</h1>
				<?php } ?>
		</section><!-- .entry-header -->
		<?php endif ?>
		
		
	<div id="page" class="hfeed site">
	<div id="main">