<?php
/*
 * Template Name: Catering
*/

get_header(); ?>
<div id="page-wrapper" class="clear-fix">
    	<div id="primary" class="content-area">
        
			<div id="content" class="site-content" role="main">
		<div class="category-title-bg clearfix" style="margin-bottom: 4px;"><h1 class="page-title"><?php single_post_title();  ?></h1></div>
<?php 
            		echo do_shortcode("[slider_pro id=12]"); 
		
				?>
				<?php while ( have_posts() ) : the_post(); ?>

    				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
    
                
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'StagDining' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'StagDining' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	
</article>

				<?php endwhile;  ?>

    <div class="category-title-bg clearfix" style="margin-bottom: 18px;"><h1 class="page-title">Featured Events</h1></div>

   <?php
        				$args = array(
							'post_type'      => 'portfolio',
							'post_status '   => 'publish',
							'posts_per_page' => '3',
							'orderby'	 => 'count',
                             'meta_key' => 'featured_event',
                             'meta_value' => '1',
							'order'          => 'ASC'
						);
						query_posts( $args );
						$count = 0;
						while(have_posts()){
							the_post();
							$srcImg 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'StagDining-small-thumbnail');
                            $permalink = get_permalink($post->ID);
    						
							echo "<div class='featured-event-entry hentry'>";
							echo "<div class='feature-thumbnail'>";
							echo "<a href='".$permalink."'><img src='".$srcImg[0]."' class='StagDining-small-thumbnail'/></a>";
							echo "</div>";
                            echo "<h3 class='entry-title'><a href='".get_permalink( $post->ID )."'>".get_the_title()."</a></h3>";
                            echo "<div class='entry-summary'>";
							custom_excerpt(60, '');
							echo "<a href='".$permalink."' class='cater-read-more'>Read more...</a>";
                            echo "</div>";
							echo "<div class='clear-fix'></div></div>";
}
					?>
					

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(services); ?></div>
<?php get_footer(); ?>