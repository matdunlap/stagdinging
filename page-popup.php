<?php
/*
 * Template Name: Mail Pop-up Page
 *
*/

get_header(popup); ?>

<div id="mail-wrapper" class="clear-fix">
   

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php while ( have_posts() ) : the_post(); ?>

    				
				
			
		<?php the_content(); ?>

	    <?php endwhile; // end of the loop. ?>
</article>
</div>

<?php wp_footer(); ?>

</body>
</html>



