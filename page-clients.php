<?php
/*
 * Template Name: Clients
*/

get_header(); ?>
<div id="page-wrapper" class="clear-fix">
        <div id="primary" class="content-area">
        
			<div id="content" class="site-content" role="main">
		<div class="category-title-bg clearfix" style="margin-bottom: 4px;"><h1 class="page-title"><?php single_post_title();  ?></h1></div>

                

<ul class="client_logos clearfix">

<?php if(get_field('logos')): ?>
  
          <?php 
           while(the_repeater_field('logos')):
           
           $image_idtag = get_sub_field('logo_image');
   
                   $client_url = get_sub_field('client_link_url');
          ?>
          

<?php   echo '<li><a href="'.$client_url.'" target="_blank"><img src="'.$image_idtag.'" class="single-logo"/></a></li>'; ?>

<?php endwhile; ?>
  <?php endif; ?>
</ul> 



<div style="clear: both;"></div>
                
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

  

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(services); ?></div>
<?php get_footer(); ?>