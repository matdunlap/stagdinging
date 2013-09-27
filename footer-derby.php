<?php
/**
 * The template for displaying the Stag footer.
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
		<?php if ( ! dynamic_sidebar( 'footer-stag-left' ) ) : ?>
		<?php endif; ?>
	</div><!-- end .about -->
	
	<div class="footer-widget-right center-widget">
		<?php if ( ! dynamic_sidebar( 'footer-stag-middle' ) ) : ?>
		<?php endif; ?>
	</div><!-- end .testimonial -->


<!-- end .homepage-sidebar -->
	</div><!-- #info -->
	</div><!-- #information -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	
	</footer><!-- #colophon .site-footer -->
<div class="bottom-triangle"></div>
</div>
<?php wp_footer(); ?>
<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(100648932); }catch(e){}</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100648932ns.gif" /></p></noscript>
</body>
</html>