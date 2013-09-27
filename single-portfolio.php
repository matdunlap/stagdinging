<?php
/*
 * Template Name: Single Portfolio item
 *
*/

get_header(); ?>
<div id="page-wrapper" class="clear-fix">
        <div id="primary" class="content-area">
        
    		<div id="content" class="site-content-event" role="main">
		<div class="category-title-bg clearfix"><h1 class="page-title"><?php single_post_title();  ?></h1></div>

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
    <div class="event-date"><?php echo date("F d, Y", strtotime(get_field('event_date'))) ?></div>
		<?php the_content(); ?>
		
		   <div class="view-menu">  Menu</div>
       
       <?php 
 
// using normal array
 
$rows = get_field('menu_item');
if($rows)
{
    echo '<ul class="event-menu" >';
 
	foreach($rows as $row)
	{
		echo '<li><strong class="event-menu-title">' . $row['menu_item_title'] . '</strong><br /> ' . $row['menu_item_description'] .'</li>';
	}
 
	echo '</ul>';
}
 
 ?>
 
		
    <div class="clearfix"></div>
   
 
        
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'StagDining' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'StagDining' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	
</article>

				
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

    <div id="secondary-event" class="widget-area" role="complementary">
			<?php 
if ( has_post_thumbnail() ) { 
  the_post_thumbnail('portfolio-img', array('class' => 'event-thumb'));
} 
?>

<?php if(get_field('sidebar_photo_gallery')): ?> 
<div class="portfolio-gallery-title">Gallery</div>
    <div class="sidebar_photo_gallery"><?php the_field('sidebar_photo_gallery'); ?></div>
<?php endif; ?>
            
            <?php do_action( 'before_sidebar' ); ?>

        <!-- #secondary .widget-area -->




</div>
<?php get_footer(); ?>