<?php
/*
 * Template Name: Home Page
 *
 * @package StagDining
 * @since StagDining 1.6
*/
get_header();

?>
<script>
  $(document).ready(function(){
if (screen.width < 960) {
        
        var elem = document.getElementById('mail-popup-contain');
    elem.parentNode.removeChild(elem);
    return false;
        
    }

});
</script>
<div id="home-wrap">
<div class="main-mailing">
<div class="category-title-bg clearfix"><h1 class="category-title">Mailing List</h1></div>
<div  class="mail-contain">

<div class="signup-item signup-text"><span>Sign Up here for updates on
upcoming stag events and news</span></div><form action="http://stagdining.us2.list-manage.com/subscribe/post?u=b7194ed698bafb9a33260696b&amp;id=f41337a5cc" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

<div class="signup-fields signup-item"><input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="E-Mail"></div><div class="signup-fields signup-item"><input type="text" placeholder="Name" value="" name="NAME" id="mce-NAME"></div><div class="signup-button signup-item"> <span class="button-outside"><button type="submit" class="submit-button" name="subscribe" id="mc-embedded-subscribe">Sign Up</button></span></div>
</div></div>

	<?php // If the user has filled out a brief introductory message in the theme options, display it here
		$options = StagDining_get_theme_options();

		if ( '' != $options['intro_text'] ) :
	?>
	<section id="intro" class="introduction">
		<p><?php echo ( stripslashes( $options['intro_text'] ) ); ?></p>
	</section><!-- .introduction -->
    
	<?php endif; ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">



			<?php
				$options = StagDining_get_theme_options();
				$primary_category = $options['primary_category'];
				$categories = array();
			?>

			<?php if ( ! empty( $primary_category ) ) { ?>

				<!-- Begin featured category section. -->
				<section id="category-highlight">

				<?php
					/* We need to first get the blog category IDs. Category IDs are stored inside a stdClass object.
					/* Let's cycle through get_categories() and place into an array the IDs of categories that are either the primary
					/* featured category OR categories that are children of the primary featured category. */

					foreach ( get_categories() as $object ) {
						if ( cat_is_ancestor_of( $primary_category, $object->term_id ) || $object->term_id == $primary_category ) :
							array_push( $categories, $object->term_id );
						endif;
					}

					/* Now that we have our featured categories, let's display their posts in a nice
					/* news-like block. We're listing categories in alphabetical order and
					/* will display up to 6 posts in each block. If a post has already appeared in the slider, it WON'T
					/* be duplicated here. */

					foreach ( $categories as $cat ) {

						$loop = new WP_Query( array(
							'category__in'   => $cat,
							'posts_per_page' => 3,
							'post__not_in'   => StagDining_get_featured_posts( 'ids-only' ),
						) );

						if ( $loop->have_posts() ) :
				?>
							<div class="category-section clear-fix">
							<div class="footer-widget gallery-mob">
		<aside id="hidden-gallery-mob" class="widget widget_text enhanced-text-widget contact-widget">
		<div class="category-title-bg clearfix" style="width: 100%;"><h1 class="category-title" style="text-align: left'">Gallery</h1></div>
		
	<a href="<?php echo home_url(); ?>/gallery"><div class="gallery-tile-img">	<?php 
			if ( has_post_thumbnail() ) { 
  the_post_thumbnail('StagDining-featured-thumbnail', array('class' => 'event-thumb'));
} ?></div></a><a href="<?php echo home_url(); ?>/gallery">
<div class="gallery-tile-img" style="margin-right: 0;">	<?php 
if( class_exists( 'kdMultipleFeaturedImages' ) ) {
     kd_mfi_the_featured_image( 'featured-image-2', 'page', 'StagDining-featured-thumbnail' );
}
?></div></a>
<div class="textwidget widget-text">View photos from the latest Stag events.
</div></aside>	</div>
								<header class="category-header">
								
									<div class="category-title-bg clearfix"><h1 class="category-title">Latest News</h1></div>
							
							
								</header>

								<?php while ( $loop->have_posts() ) : $loop->the_post();

									$featured_post_ids[] = get_the_ID();

									/* Let's show a thumbnail (if it exists), title, and excerpt for each post */
								?>
									<article <?php post_class(); ?>>
										<?php if ( '' != get_the_post_thumbnail() ) : ?>
											<div class="feature-thumbnail">
												<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'StagDining' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
													<span class="post-format-icon"><?php echo get_post_format(); ?></span>
													<?php the_post_thumbnail( 'StagDining-small-thumbnail', array( 'class' => 'StagDining-small-thumbnail', 'alt' => get_the_title(), 'title' => get_the_title() ) ); ?>
												</a>
											</div><!-- .feature-thumbnail -->
										<?php endif; // end check for post thumbnail existence ?>

										<header>
											<h3 class="entry-title">
												<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'StagDining' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
											</h3><!-- .entry-title -->
										</header>

										<div class="entry-summary">
											<?php the_excerpt(); ?>
											<?php edit_post_link( __( 'Edit', 'StagDining' ), '<span class="edit-link">', '</span>' ); ?>
										</div><!-- .entry-summary -->

									</article><!-- .hentry -->

								<?php

									endwhile;

									wp_reset_query();
								?>

							</div><!-- .category-section -->

						<?php endif;  //end the check for existence of posts

					} //end foreach ?>

				</section><!-- .category-highlight -->

			<?php } // end check for primary category option ?>
                            <div class="thick-divide-contain"><div class="thick-divide clear-fix"></div></div>
		</div><!-- #content -->
<div id="mail-popup-contain">
	<a href="<?php echo home_url(); ?>/mailing-list" class="fancybox-iframe mail-popup" id="mail-popup">.</a>
    </div>
    
	<script>
function setCookie(c_name,value,exdays)
	{
		var exdate=new Date();
		exdate.setDate(exdate.getDate() + exdays);
		var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
		document.cookie=c_name + "=" + c_value;
	}
	function getCookie(c_name)
	{
		var c_value = document.cookie;
		var c_start = c_value.indexOf(" " + c_name + "=");
		if (c_start == -1)
		{
		c_start = c_value.indexOf(c_name + "=");
		}
		if (c_start == -1)
		{
		c_value = null;
		}
		else
		{
		c_start = c_value.indexOf("=", c_start) + 1;
		var c_end = c_value.indexOf(";", c_start);
		if (c_end == -1)
		{
		c_end = c_value.length;
		}
		c_value = unescape(c_value.substring(c_start,c_end));
		}
		return c_value;
	}
	
	function checkCookie()
	{
		var username=getCookie("username");
		if (username!=null && username!="")
		{
			$('#mail-popup').remove();
		}
		else 
		{
			username="visited";
			if (username!=null && username!="")
			{
				setCookie("username",username,7);
			}
		}
	}

   $(document).ready( function(){
		checkCookie();
	} 
        
);
	</script>

</div><!-- #primary .site-content -->
</div><!-- #home-wrap -->

<?php get_footer(); ?>