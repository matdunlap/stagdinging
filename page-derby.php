<?php
/*
 * Template Name: Derby Cocktail
 *
 * @package StagDining
 * @since StagDining 1.6
*/
get_header(derby);

?>
<?php 
        			echo do_shortcode("[slider_pro id=14]"); 
		
				?>
<div id="home-wrap">
   <div id="page-wrapper" class="clearfix">

	<div id="primary" class="site-content">
		<div id="content" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

    				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
    
                
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'StagDining' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

</article>

				<?php endwhile; // end of the loop. ?>



			<?php
				$options = StagDining_get_theme_options();
				$primary_category = $options['primary_category'];
				$categories = array('category'        => '64');
			?>

			<?php if ( ! empty( $primary_category ) ) { ?>

				<!-- Begin featured category section. -->
				<section id="category-highlight">

				<?php
					/* We need to first get the blog category IDs. Category IDs are stored inside a stdClass object.
					/* Let's cycle through get_categories() and place into an array the IDs of categories that are either the primary
					/* featured category OR categories that are children of the primary featured category. */

				

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
								<header class="category-header">
								
									<div class="category-title-bg clearfix"><h1 class="category-title" style="background: #fdfdfd;">Latest Derby News</h1></div>
							
							
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

						<?php endif; //end the check for existence of posts

					} //end foreach ?>

				</section><!-- .category-highlight -->

			<?php } // end check for primary category option ?>
        <div class="category-title-bg clearfix"><h1 class="category-title" style="background: #fdfdfd;">DERBY COCKTAIL CO. MENU</h1></div>

 
 
 
 <?php if(get_field('the_cocktail_menu')): ?>
 
    <ul class="cocktail-menu">
 
	<?php while(has_sub_field('the_cocktail_menu')): ?>
 
		<li><strong class="cocktail-menu-title"><?php the_sub_field('cocktail_title'); ?></strong><br />
        <?php the_sub_field('cocktail_item_description'); ?></li>
 
	<?php endwhile; ?>
 
	</ul>
 
<?php endif; ?>
                      
                      
                
                           
                           
		</div><!-- #content -->
	</div><!-- #primary .site-content -->
    <?php get_sidebar(derby); ?>
 </div>
    <div class="main-mailing clearfix">
<div class="category-title-bg clearfix"><h1 class="category-title">Mailing List</h1></div>
<div  class="mail-contain">

<div class="signup-item signup-text"><span>SIGN UP HERE FOR UPDATES ON UPCOMING DERBY EVENTS AND NEWS</span></div>


<div class="signup-fields signup-item"><form action="http://stagdining.us2.list-manage.com/subscribe/post?u=b7194ed698bafb9a33260696b&amp;id=f41337a5cc" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="E-Mail"></div><div class="signup-fields signup-item"><input type="text" placeholder="Name" value="" name="NAME" id="mce-NAME"></div><div class="signup-button signup-item"> <span class="button-outside"><button type="submit" class="submit-button" name="subscribe" id="mc-embedded-subscribe">Sign up</button></span></div>
</div></div>

    </div><!-- #home-wrap -->

<?php get_footer(derby); ?>