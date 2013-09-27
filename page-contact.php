<?php
/*
 * Template Name: Contact
*/

get_header(); ?>
<div id="page-wrapper" class="clear-fix">
        <div id="primary" class="content-area">
        
    		<div id="content" class="site-content" role="main">
		<div class="category-title-bg clearfix" style="margin-bottom: 4px;"><h1 class="page-title"><?php single_post_title();  ?></h1></div>

                
				<?php while ( have_posts() ) : the_post(); ?>

    				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
                
		<?php the_content(); ?>
        
  <form id="form-3-1379221356" method="post" action="/contact/" class="customcontactform">

<div>
<label for="name" class="noshow">Name of the Client</label>
<input class=" " id="name-1378359453" type="text" name="name" value="" placeholder="Name of the Client">
</div>
<div>
<label for="Phone" class="noshow">Phone Number</label>
<input class=" " id="Phone-1378359453" type="text" name="Phone" value="" placeholder="Phone # (cell or work)">
</div>
<div>
<label for="Email" class="noshow">E-mail</label>
<input class=" " id="Email-1378359453" type="text" name="Email" value="" placeholder="E-mail Address">
</div>
<div>
<label for="Mailing_Address" class="noshow">Mailing Address</label>
<textarea class="contact-mailing " id="Mailing_Address-1378359453" rows="5" placeholder="Mailing Address" cols="40" name="Mailing_Address"></textarea>
</div>
<div>
<label for="event_location" class="noshow">Event Location</label>
<input class=" " id="event_location-1378359453" type="text" name="event_location" value="" placeholder="Event Location">
</div>
<div>
<label for="number_of_people" class="noshow">Number of people</label>
<input class=" " id="number_of_people-1378359453" type="text" name="number_of_people" value="" placeholder="Number of people">
</div>
<div>
<label for="Date" class="normal-label">Event Start Date:</label>
<input class="cf7-datepicker" id="Date-1378359453" type="text" name="Date" value="" placeholder="MM/DD/YYYY">
</div>
<div style="padding-top: 0;">
<label for="end_date" class="normal-label">Event End Date:</label>
<input class="cf7-datepicker2" id="end_date-1378359453" type="text" name="end_date" value="" placeholder="MM/DD/YYYY">
</div>
<div style="margin-top: 19px;">
<label for="start_time" class="noshow">Event Start Time</label>
<input class=" " id="start_time-1378510284" type="text" name="start_time" value="" placeholder="Event Start Time">
</div>
<div>
<label for="end_time" class="noshow">Event End Time</label>
<input class=" " id="end_time-1378510284" type="text" name="end_time" value="" placeholder="Event End Time">
</div>


<div class="sweet-buttons">
<label for="Venue_assistance" class="normal-label">Do you need event planning assistance for booking a venue?</label>
<div><input class=" " type="radio" name="Venue_assistance" value="yes"> <label class="select" for="Venue_assistance">yes</label></div>
<div><input class=" " type="radio" name="Venue_assistance" value="no"> <label class="select" for="Venue_assistance">no</label></div>
</div>
<div class="contact-radio-row">
<label for="Type_of_event" class="normal-label">Type of Event:</label>
<div><input class=" " type="checkbox" name="Type_of_event[0]" value="Corporate"> <label class="select" for="Type_of_event">Corporate</label></div>
<div><input class=" " type="checkbox" name="Type_of_event[1]" value="Non-profit"> <label class="select" for="Type_of_event">Non-profit</label></div>
<div><input class=" " type="checkbox" name="Type_of_event[2]" value="Wedding"> <label class="select" for="Type_of_event">Wedding</label></div>
<div><input class=" " type="checkbox" name="Type_of_event[3]" value="Private Celebration"> <label class="select" for="Type_of_event">Private Celebration</label></div>
<div><input class=" " type="checkbox" name="Type_of_event[4]" value="Other"> <label class="select" for="Type_of_event">Other:</label><label for="other_event_type" class="noshow">Other Event Type</label><input class="other-type " id="other_event_type-1378359453" type="text" name="other_event_type" value=""placeholder="details"></div>
</div>

<div class="contact-radio-row">
<label for="Beverages" class="normal-label">Beverages:</label>
<div><input  type="checkbox" name="Beverages[0]" value="Cocktails"> <label class="select" for="Beverages">Cocktails</label></div>
<div><input  type="checkbox" name="Beverages[1]" value="Wine"> <label class="select" for="Beverages">Wine</label></div>
<div><input  type="checkbox" name="Beverages[2]" value="Beer"> <label class="select" for="Beverages">Beer</label></div>
<div><input  type="checkbox" name="Beverages[3]" value="Non-Alcoholic"> <label class="select" for="Beverages">Non-Alcoholic</label></div>
<div><input type="checkbox" name="Beverages[4]" value="Other"> <label class="select" for="Beverages">Other:</label><label for="Other_beverages" class="noshow">Other Beverages</label><input class="other-type " id="Other_beverages-1378359453" type="text" name="Other_beverages" value="" placeholder="details"></div></div>

<div class="contact-radio-row" style="margin-bottom: 18px !important; width: 100% !important; clear: both;">
<label for="Format" class="normal-label">Format:</label>
<div><input class=" " type="checkbox" name="Format[0]" value="Hors D'oeuvres"> <label class="select" for="Format">HORS D'OEUVRES/PASSED PLATES</label></div>
<div><input class=" " type="checkbox" name="Format[1]" value="Sit Down Dinner"> <label class="select" for="Format">Sit Down Dinner</label></div>
<div><input class=" " type="checkbox" name="Format[2]" value="Food Stations"> <label class="select" for="Format">Food Stations</label></div>
<div><input class=" " type="checkbox" name="Format[3]" value="Other"> <label class="select" for="Format">Other:</label><label for="Other_format" class="noshow">Other Format</label>
<input class="other-type " id="Other_format-1378359453" type="text" name="Other_format" value="" placeholder="details"></div>
</div>

<div class="clearfix" style="width: 100%">
<label for="Special_Instructions" class="noshow">Special Instructions</label>
<textarea class="contact-field" id="Special_Instructions-1378359453" rows="5" cols="40" name="Special_Instructions" placeholder="Special Instructions"></textarea>
</div>

<input name="form_page" value="/stag/contact/" type="hidden">
<input type="hidden" name="fid" value="3">
<span class="button-outside contact-submit" style="width: 111px !important;">
<input type="submit" id="submit-3-1378359453" class="submit-button" value="Submit" name="customcontactforms_submit"></span>
</form>
        
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'StagDining' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'StagDining' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	
</article>

				<?php endwhile;  ?>

  

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?></div>
<?php get_footer(); ?>