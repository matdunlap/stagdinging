<?php
/*
 * Template Name: Press
*/
    the_post();
get_header(); ?>

<script>

	$(window).load(function() {
		
		var container = document.querySelector('#double-quote');
		var msnry = new Masonry( container, {
		  // options
		  columnWidth: '.grid-sizer',
		  itemSelector: '.double-quote-item'
		});
		});
		
</script>


<div id="page-wrapper" class="clear-fix">
        <div id="primary" class="content-area">
        
			<div id="content" class="site-content" role="main">
		<div class="category-title-bg clearfix"><h1 class="page-title"> <?php single_post_title();  ?></h1></div>

			<div class="calendar-content"> <?php the_content(); ?></div>

					<article class="post type-post format-standard hentry category-news">

    <div class="entry-content events-entry-content">
					
				<div id="double-quote" class="js-masonry"
  data-masonry-options='{ "columnWidth": ".grid-sizer", "itemSelector": ".double-quote-item" }'><div class="grid-sizer"></div>	<?php
    					$args = array(
							'post_type'      => 'review',
							'post_status '   => 'publish',
							'posts_per_page' => '-1',
							'orderby'    	 => 'date',
							'order'          => 'DESC'
						);
						query_posts( $args );
						$count = 0;
						while(have_posts()){
							the_post();
							$srcImg 	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'StagDining-small-thumbnail');
                            $srcImgFull     = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                            $article = get_field('article_link'); 
                            $article2 = get_field('publication'); 
                            $date = get_the_date( 'M j, Y' );
                            
                            if( get_field('featured_press') )
{
    echo "<div class='featured-quote-item'>";
}

    						
							echo "<div class='double-quote-item'><div class='press-quote'>";
							if ($srcImg){
                            echo "<a href='".$srcImgFull[0]."' rel='prettyPhoto gallery[1]'><img src='".$srcImg[0]."' class='press-thumbnail'/></a>";
							}
                            the_content('Read more');
                               if ($article){
                           echo "</div><div class='article-link'>";
                           }
                           
                            if ($article2){
                            echo "- ";
                           }
                           
                          
                           the_field('publication');
                           
                               if ($article){
                           echo "<a href='".get_field('article_link')."' target='_blank' >(".get_the_title()." - ".$date.")</a></div></div>";
  
                              if( get_field('featured_press') )
{
    echo "</div>";
}
  
       }
							
}
					?></div>
    
    
    
    
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