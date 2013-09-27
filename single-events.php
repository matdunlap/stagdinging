<?php
/*
 * Template Name: Single Event Page
 *
*/

get_header(); ?>
<div id="page-wrapper" class="clear-fix">
        <div id="primary" class="content-area">
        
			<div id="content" class="site-content-event" role="main">
		<div class="category-title-bg clearfix"><h1 class="page-title"><?php single_post_title();  ?></h1></div>

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php 
        					$location_address = get_field('location'); 
							$map_address = $location_address['address'];
                            
                          
						?>
    <div class="entry-content">
    <div class="event-date"><a href="<?php the_field('ticket_link'); ?>" target="_blank" ><?php echo date("l, M j, Y", strtotime(get_field('event_date'))) ?> </a>
    <?php if(get_field('event_date') >= date('Y/m/d')): ?> <span class="bullet"> • </span> <a href="<?php the_field('ticket_link'); ?>" target="_blank" ><?php the_field('event-price'); ?></a><?php endif; ?></div>
    
    <div class="event-time"><?php the_field('location_title'); ?> </div>
  <!--  <div class="event-partners"><?php the_field('partners'); ?></div> -->
		<?php the_content(); ?>
        
        <div class="event-details-top">            
<div class="event-location"><strong>Time: </strong><?php the_field('start_time'); ?> - <?php the_field('end_time'); ?></div>
<div class="event-location"><?php if ($map_address): ?><strong>Address:</strong> <a href="
http://maps.google.com/?q=<?php echo $map_address ?>" target="_blank">
<?php echo $map_address ?></a><?php endif; ?></div></div>
        
       <div class="view-menu">  Menu</div>
       
       <?php 
 
// using normal array
 
$rows = get_field('menu_item');
if($rows)
{
    echo '<ul class="event-menu" >';
 
	foreach($rows as $row)
	{
		echo '<li><strong class="event-menu-title">' . $row['menu_item_title'] . '</strong><br /> ' . $row['menu_item_description'] .'</li>';
	}
 
	echo '</ul>';
}
 
 ?>
 

       
         
<?php if(get_field('event_date') >= date('Y/m/d')): ?> 
    <span class="ticket-button-outside"><a href="<?php the_field('ticket_link'); ?>" target="_blank" class="ticket-button">Buy Tickets</a></span>
<?php endif; ?>
    
  

		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'StagDining' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	
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
      
<div class="event-details-side">            
<div class="event-location"><strong>Time: </strong><?php the_field('start_time'); ?> - <?php the_field('end_time'); ?></div>
<div class="event-location"><?php if ($map_address): ?><strong>Address:</strong> <a href="
http://maps.google.com/?q=<?php echo $map_address ?>" target="_blank">
<?php echo $map_address ?></a></div><?php endif; ?></div>

<div id="map" style="width: 100%; height: 250px;"></div>
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
                         <div class="event-details-top map-address-two">            
<div class="event-location"><?php if ($map_address): ?><a href="
http://maps.google.com/?q=<?php echo $map_address ?>" target="_blank">
<?php echo $map_address ?></a><?php endif; ?></div></div>
                        
            <?php if(get_field('event_date') >= date('Y/m/d')): ?> 
            <h1 class="widget-title">Share This Event</h1>
   <?php echo do_shortcode('[ssba]') ?><?php endif; ?>
		</div>
        
        <!-- #secondary .widget-area -->
</div>
 <div class="single-event-gallery clearfix" >

        

<?php
    foreach ( get_field ( 'associate_gallery' ) as $nextgen_gallery_id ) :
        if ( $nextgen_gallery_id['ngg_form'] == 'album' ) {
            
            echo nggShowAlbum( $nextgen_gallery_id['ngg_id'] ); //NextGEN Gallery album
        } elseif ( $nextgen_gallery_id['ngg_form'] == 'gallery' ) {
            echo '<h3 class="event-photo">Photos from ';  
            echo  single_post_title();
            echo '</h3>';
             echo do_shortcode('[justified_image_grid ng_gallery='.$nextgen_gallery_id['ngg_id'].']'); 
        }
    endforeach;
?>
   </div> 
<?php get_footer(); ?>