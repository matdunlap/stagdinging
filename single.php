<?php
/**
 * The Template for displaying all single posts.
 *
 * @package StagDining
 * @since StagDining 1.0
 */

get_header(); ?>
<div id="page-wrapper" class="clear-fix">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
    <div class="category-title-bg clearfix"><h1 class="page-title">Stag News</h1></div>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php StagDining_content_nav( 'nav-below' ); ?>


			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?></div>
<?php get_footer(); ?>