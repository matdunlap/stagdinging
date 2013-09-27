<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package StagDining
 * @since StagDining 1.0
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

<?php get_sidebar(); ?></div>
<?php get_footer(); ?>