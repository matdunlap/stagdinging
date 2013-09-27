<?php
/*
 * Template Name: Derby
 *
 * @package StagDining
 * @since StagDining 1.6
*/
get_header(derby);

?>

<div id="home-wrap">
   <div id="page-wrapper" class="clearfix">

	<div id="primary" class="site-content">
		<div id="content" role="main">

<div class="top-title-bg clearfix"><h1 class="page-title">Derby News</h1></div>
    		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php StagDining_content_nav( 'nav-below' ); ?>


			<?php endwhile; ?>


                       
		</div><!-- #content -->
	</div><!-- #primary .site-content -->
    <?php get_sidebar(derby); ?>
    </div>
    <div class="main-mailing clearfix">
<div class="category-title-bg clearfix"><h1 class="category-title">Mailing List</h1></div>
<div  class="mail-contain">

<div class="signup-item signup-text"><span>SIGN UP HERE FOR UPDATES ON UPCOMING DERBY EVENTS AND NEWS</span></div>


<div class="signup-fields signup-item"><form action="http://stagdining.us2.list-manage.com/subscribe/post?u=b7194ed698bafb9a33260696b&amp;id=f41337a5cc" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="E-Mail"></div><div class="signup-fields signup-item"><input type="text" placeholder="Name" value="" name="NAME" id="mce-NAME"></div><div class="signup-button signup-item"> <span class="button-outside"><button type="submit" class="submit-button" name="subscribe" id="mc-embedded-subscribe">Sign up</button></span></div>
</div></div>

    
 
</div><!-- #home-wrap -->

<?php get_footer(derby); ?>