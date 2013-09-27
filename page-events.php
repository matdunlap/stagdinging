<?php
/*
 * Template Name: Event Page
 *
*/
    the_post();
get_header(); ?>
<div id="page-wrapper" class="clear-fix">
    	<div id="primary" class="content-area">
        
			<div id="content" class="site-content" role="main">
		<div class="category-title-bg clearfix"><h1 class="page-title"> <?php single_post_title();  ?></h1></div>

			<div class="calendar-content"> <?php the_content(); ?></div>

					<article class="post type-post format-standard hentry category-news">

    <div class="entry-content events-entry-content">
					
					<?php
    					$args = array(
							'post_type'      => 'events',
							'post_status '   => 'publish',
							'posts_per_page' => '-1',
							'orderby'	 => 'meta_value',
							'meta_key' 	 => 'event_date',
							'meta_value'	 => date('Y/m/d'),
							'meta_compare'	 => '>=',
							'order'          => 'ASC'
						);
						query_posts( $args );
						$count = 0;
                        
                        
                        
						while(have_posts()){
							$count++;
							the_post();
							$srcImgSmall 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
                                $srcImg 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'StagDining-wide-event-thumbnail');
                            
    						
							echo "<div class='events-entry'><div class='single-thumbnail'>";
							echo "<div class='event-thumb-desk'><a href='".get_permalink( $post->ID )."'>";
							echo "<img src='".$srcImgSmall[0]."' width='175' height='175' class='event-thumbnail'/>";
							echo "</a></div>";
                            
     						echo "<div class='event-thumb-mobile'><a href='".get_permalink( $post->ID )."'>";
							echo "<img src='".$srcImg[0]."' class='event-thumbnail'/>";
							echo "</a></div>";
                            
							echo "</div>";
                            echo "<h1 class='event-page-date'><a href='".get_permalink( $post->ID )."'>".get_the_title()."<div class='event-mob-date'>" . date("l, M j, Y", strtotime(get_field('event_date')))."</div></a></h1>";
                            echo "<div class='event-time'><a href='".get_permalink( $post->ID )."'>".get_field('start_time')." - ".get_field('end_time')."</a></div>";
							the_excerpt();
                            echo "<span class='ticket-button-outside event-page-button'><a href='".get_field('ticket_link')."' target='_blank' class='ticket-button'>Buy Tickets</a></span>";
							echo "<div class='clear-fix'></div></div>";
}
if($count == 0)	echo "<div class='no-events'>Stay Tuned. The next Clandestine Dinner will be announced soon.</div>";

if($count == 0) echo do_shortcode("[slider_pro id=16]"); 
					?>
    
    
    
    
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'StagDining' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'StagDining' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	
</article>

				
			

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?></div>
<?php get_footer(); ?>