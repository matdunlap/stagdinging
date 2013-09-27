<?php
/*
 * Template Name: Past Single Event
 *
*/

get_header(); ?>
<div id="page-wrapper" class="clear-fix">
        <div id="primary" class="content-area">
        
    		<div id="content" class="site-content-event" role="main">
		<div class="category-title-bg clearfix"><h1 class="page-title"><?php single_post_title();  ?></h1></div>

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
    <div class="event-date"><?php echo date("l, M d, Y", strtotime(get_field('event_date'))) ?></div>
    <div class="event-time"><?php the_field('start_time'); ?> - <?php the_field('end_time'); ?></div>
  <!--  <div class="event-partners"><?php the_field('partners'); ?></div> -->
		<?php the_content(); ?>
         <a href="<?php the_field('menu_link'); ?>" target="_blank">View Menu</a><br />
         
    
    <div class="clearfix"></div>
    <div class="single-event-gallery clearfix" style="width: 700px; margin-top: 40px; clear: both;">

<?php
    foreach ( get_field ( 'associate_gallery' ) as $nextgen_gallery_id ) :
        if ( $nextgen_gallery_id['ngg_form'] == 'album' ) {
            echo nggShowAlbum( $nextgen_gallery_id['ngg_id'] ); //NextGEN Gallery album
        } elseif ( $nextgen_gallery_id['ngg_form'] == 'gallery' ) {
             echo do_shortcode('[justified_image_grid ng_gallery='.$nextgen_gallery_id['ngg_id'].']'); 
        }
    endforeach;
?>
   </div>
     
           
            
            
        
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'StagDining' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'StagDining' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	
</article>

				
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

    <div id="secondary-event" class="widget-area" role="complementary">
			<?php 
if ( has_post_thumbnail() ) { 
  the_post_thumbnail('medium', array('class' => 'event-thumb'));
} 
?>
            
            <?php do_action( 'before_sidebar' ); ?>
<div class="event-location"><?php the_field('location_title'); ?></div>
<div class="event-location"><?php the_field('event_address'); ?></div>

<div id="map" style="width: 310px; height: 250px;"></div>
            			<?php 
							$location = get_field('location'); 
							$temp = explode(',', $location['coordinates'] );
							$lat = (float) $temp[0];
							$lng = (float) $temp[1];
						?>
						<script src='http://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>
						<script type="text/javascript">
						//<![CDATA[
						function load() {
							var lat = <?php echo $lat; ?>;
							var lng = <?php echo $lng; ?>;
							// coordinates to latLng
							var latlng = new google.maps.LatLng(lat, lng);
							// map Options
							var myOptions = {
							  zoom: 14,
							  center: latlng,
							  mapTypeId: google.maps.MapTypeId.ROADMAP
							};
							//draw a map
							var map = new google.maps.Map(document.getElementById("map"), myOptions);
							var marker = new google.maps.Marker({
								position: map.getCenter(),
								map: map
							});
						}
						// call the function
						load();
						//]]>
						</script>
            

		</div>
      
        <!-- #secondary .widget-area -->




</div>
<?php get_footer(); ?>