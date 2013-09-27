<?php
/*
 * Template Name: Services
*/

get_header(); ?>
<div id="page-wrapper" class="clear-fix">
		<div id="primary" class="content-area">
        
			<div id="content" class="site-content" role="main">
		<div class="category-title-bg clearfix"><h1 class="page-title"><?php single_post_title();  ?></h1></div>

				<?php while ( have_posts() ) : the_post(); ?>

    				<?php get_template_part( 'content', 'page' ); ?>
				
				<?php endwhile;  ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(services); ?></div>
<?php get_footer(); ?>