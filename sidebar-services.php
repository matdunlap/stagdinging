<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package StagDining
 * @since StagDining 1.0
 */
?>
		<div id="secondary" class="widget-area clearfix" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>


			<?php if ( ! dynamic_sidebar( 'sidebar-services' ) ) : ?>

				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', 'StagDining' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', 'StagDining' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
