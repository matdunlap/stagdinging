<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package StagDining
 * @since StagDining 1.0
 */
?>



	</div><!-- #main .site-main -->
	
	</div><!-- #page .hfeed .site -->
	
	<div id="information">
    
	<div id="info">
    
	<div class="footer-widget">
		<?php if ( ! dynamic_sidebar( 'footer-widgets-left' ) ) : ?>
		<?php endif; ?>
	</div><!-- end .about -->
	
	<div class="footer-widget center-widget">
		<?php if ( ! dynamic_sidebar( 'footer-widgets-middle' ) ) : ?>
		<?php endif; ?>
	</div><!-- end .testimonial -->


	<div class="footer-widget-right">
	<?php if ( ! dynamic_sidebar( 'footer-widgets-right' ) ) : ?>
	<?php endif; ?>
	</div><!-- end .homepage-sidebar -->
	</div><!-- #info -->
	</div><!-- #information -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	
	</footer><!-- #colophon .site-footer -->
<div class="bottom-triangle"></div>
</div>
<?php wp_footer(); ?>
<script type="text/javascript">
var clicky_site_ids = clicky_site_ids || [];
clicky_site_ids.push(100648932);
(function() {
  var s = document.createElement('script');
  s.type = 'text/javascript';
  s.async = true;
  s.src = '//static.getclicky.com/js';
  ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
})();
</script>
</body>
</html>