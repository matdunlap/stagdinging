<?php
/*
 * Template Name: About Stag
*/

get_header(); ?>
<div id="page-wrapper" class="clear-fix">
        <div id="primary" class="content-area clearfix">
        
        	<div id="content" class="site-content" role="main">
		<div class="category-title-bg clearfix" style="margin-bottom: 4px; "><h1 class="page-title"><?php single_post_title();  ?></h1></div>


                
				<?php while ( have_posts() ) : the_post(); ?>

    				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
    <div id="filter" class="clearfix">    			
				<div id="categories">

             
<a id="mission1" href="#mission" class="anchorLink" title="" style="font-size: 16px;">Our Mission</a>
<a id="vision1" href="#vision" class="anchorLink" title="" style="font-size: 16px;">Culinary Vision</a>
<a href="#sustainability" class="anchorLink" title="" style="font-size: 16px;">Sustainability</a>
				</div></div>

		<?php the_content(); ?>
        
        
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'StagDining' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'StagDining' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	
</article>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?></div>
<?php get_footer(); ?>

<?php 
$landing = $_GET['landing'];
?>
<script>
jQuery(document).ready(function() {
	var $landing = '<?php echo $landing; ?>';
	//alert($landing);

	//$(caller).click(function (event) {	
	//	event.preventDefault()
		var locationHref = window.location.href;
		var elementClick = '#' + $landing;
		
		var destination = $(elementClick).offset().top;
		jQuery("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, 1000, function() {
			window.location.hash = elementClick
		});
	//})
	//alert(5);
	
});

</script>