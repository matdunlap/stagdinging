<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package StagDining
 * @since StagDining 1.0
 */

get_header(); ?>
<div id="page-wrapper" class="clear-fix">
		<section id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
<div class="category-title-bg clearfix"><h1 class="category-title"><?php printf( __( '%s', 'StagDining' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1></div>
			<?php if ( have_posts() ) : ?>


				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

			

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

<?php get_sidebar(); ?></div>
<?php get_footer(); ?>