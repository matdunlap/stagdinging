<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package StagDining
 * @since StagDining 1.0
 */

get_header(); ?>
<div id="page-wrapper" class="clear-fix">
		<div id="primary" class="content-area">
        
			<div id="content" class="site-content" role="main">
		<div class="category-title-bg clearfix"><h1 class="page-title">Oops! That page can&rsquo;t be found.</h1></div>

				<?php while ( have_posts() ) : the_post(); ?>

    				
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
    
    
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'StagDining' ); ?></p>
        
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'StagDining' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'StagDining' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	
</article><!-- #post-<?php the_ID(); ?> -->

				
				<?php endwhile;  ?>

			</div>
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?></div>
<?php get_footer(); ?>