<?php
/*
 * Template Name: New Gallery Page
 *
*/

get_header(); ?>

<div id="page-wrapper" class="clear-fix" style="">

    <div id="secondary" class="widget-area" role="complementary">

    			<aside id="archives" class="widget">
				<div class="right-head">     <div class="category-title-bg clearfix"><h1 class="page-title"> <?php single_post_title();  ?></h1></div>
                
                <div id="filter">    			
				<div id="categories">
			<a href="<?php echo home_url(); ?>/gallery" class="tag-link-46" title="all" style="font-size: 16px;">All</a>
            <?php $mainargs = array(
    'number'    => 45, 
      'smallest' => 16, 
    'largest' => 16,
    'unit'   => 'px', 
    'seperator'    => '|',
    'format'    => 'flat',    
    'orderby'   => 'name', 
    'order'     => 'DESC',
    'include'     => '46,47',
    'link'      => 'view', 
    'taxonomy'  => 'ngg_tag', 
    'echo'      => true ); ?>
 
<?php ng_tag_cloud($mainargs); ?><a href="<?php echo home_url(); ?>/video" class="tag-link-46" title="all" style="font-size: 16px;">Videos</a>
				</div></div>
                
                
                
                
                </div>
			
           <div class="left-head">   <h1 class="widget-title">Choose a Gallery </h1></div>
                    <a class="button" id="choose-gallery" href="#">Choose Gallery<span id="select_gal"></span></a>
                    <div id="tags">
<?php 
$homeurl = home_url();
$gallerytag = $_GET['gallerytag'];
if ($gallerytag == '') $gallerytag = '%';
$tag_link = '$homeurl/gallery';

global $wpdb;
$tp = "dswp_";

$pid_list = (array)$wpdb->get_results("
			SELECT {$tp}ngg_pictures.pid as pid
			FROM {$tp}terms, {$tp}term_taxonomy, {$tp}term_relationships, {$tp}ngg_pictures
			WHERE {$tp}term_taxonomy.taxonomy = 'ngg_tag'
			AND {$tp}term_taxonomy.term_id = {$tp}terms.term_id
			AND {$tp}term_taxonomy.term_taxonomy_id = {$tp}term_relationships.term_taxonomy_id
			AND {$tp}term_relationships.object_id = {$tp}ngg_pictures.pid
			AND {$tp}terms.name like '{$gallerytag}'
		");

		$pid_array = "";
		foreach($pid_list as $pid){
			$pid_array .= $pid->pid . ",";
		}
		$pid_array = "(" . $pid_array . "-1)";
		
$tag_list = (array)$wpdb->get_results("
			SELECT {$tp}terms.term_id as tag_ID,
				{$tp}terms.name as tag_name,
				{$tp}term_taxonomy.count as count
			FROM {$tp}terms, {$tp}term_taxonomy, {$tp}term_relationships, {$tp}ngg_pictures
			WHERE {$tp}term_taxonomy.taxonomy = 'ngg_tag'
			AND {$tp}term_taxonomy.term_id = {$tp}terms.term_id
			AND {$tp}term_taxonomy.term_taxonomy_id = {$tp}term_relationships.term_taxonomy_id
			AND {$tp}term_relationships.object_id = {$tp}ngg_pictures.pid
			AND {$tp}ngg_pictures.pid in {$pid_array}
			
			GROUP BY tag_name
			ORDER BY count desc
		");

		foreach($tag_list as $tag){
			if ($tag->tag_name == 'Photos') continue;
			if ($tag->tag_name == 'Dinners') continue;
            if ($tag->tag_name == 'Weddings') continue;
            if ($tag->tag_name == 'Public Dinners') continue;
            if ($tag->tag_name == 'Private Gatherings') continue;
		    if ($tag->tag_name == 'Corporate Events') continue;
			echo "<a href='$tag_link?gallerytag=$tag->tag_name'>" .$tag->tag_name . "</a>";
		}
		
?>    

    <?php $args = array(
    'number'    => 0,  
    'format'    => 'flat',
    'orderby'   => 'name', 
    'order'     => 'DESC',
    'exclude'     => '46,47, 78, 79, 80',
    'link'      => 'view', 
    'taxonomy'  => 'ngg_tag', // Get next gen tags not post tags
    'echo'      => true ); ?>
 
<?php //ng_tag_cloud($args); ?>

    </div>
				</aside>
		</div><!-- #secondary .widget-area -->



        <div id="primary" class="content-area clearfix">        
    		<div id="content" class="site-content" role="main">
			<div class="left-head">	<div class="category-title-bg clearfix"><h1 class="page-title"> <?php single_post_title();  ?></h1></div>
  
  
      	<div id="filter-top">				
				<div id="categories-top">
		
            <?php $topargs = array(
    'number'    => 45, 
      'smallest' => 22, 
    'largest' => 22,
    'unit'   => 'px', 
    'seperator'    => '|',
    'format'    => 'flat',    
    'orderby'   => 'name', 
    'order'     => 'ASC',
    'include'     => '69, 79, 78, 71, 80',
    'link'      => 'view', 
    'taxonomy'  => 'ngg_tag', // Get next gen tags not post tags
    'echo'      => true ); ?>
 
<?php ng_tag_cloud($topargs); ?>
				</div></div>
  
  
  
				<div id="filter">				
				<div id="categories">
			<a href="<?php echo home_url(); ?>/gallery" class="tag-link-46" title="all" style="font-size: 16px;">All</a>
            <?php $mainargs = array(
    'number'    => 45, 
      'smallest' => 16, 
    'largest' => 16,
    'unit'   => 'px', 
    'seperator'    => '|',
    'format'    => 'flat',    
    'orderby'   => 'name', 
    'order'     => 'DESC',
    'include'     => '46,47',
    'link'      => 'view', 
    'taxonomy'  => 'ngg_tag', // Get next gen tags not post tags
    'echo'      => true ); ?>
 
<?php ng_tag_cloud($mainargs); ?><a href="<?php echo home_url(); ?>/video" class="tag-link-46" title="all" style="font-size: 16px;">Videos</a>
				</div></div></div>
                
                <div style="clear:both;"></div>
				
		
				
				<article class="post type-post format-standard hentry category-news">

					<div class="entry-content" id="gallery">					

						<?php echo do_shortcode('[justified_image_grid ng_gallery=60,59,58,57,56,55,54,53,52,51,50,49,48,47,46,45,44,43,42,41,40,39,38,37,36,35,34,33,32,31,30,29,28,27,26,25,24,23,22,21,20,19,18,17,16,15,14,13,12,11,10,9,8,7,6,5,4,3,2,1]'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'page' ); ?>				
						<?php endwhile; // end of the loop. ?>

						<?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'StagDining' ), 'after' => '</div>' ) ); ?>
						
					</div><!-- .entry-content -->

				</article>
			</div><!-- #content .site-content -->	
		</div><!-- #primary .content-area -->

</div>

<script>
jQuery(document).ready(function($) {
	jQuery('.category').bind('click', function(){
			var data = {
			action: 'my_action',
			category: jQuery(this).attr('rel_cat')
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		jQuery.post(ajaxurl, data, function(response) {
			console.log(response);
			jQuery('#gallery').html(response);
		});
	});

	jQuery('.tag').bind('click', function(){
			var data = {
			action: 'my_action',
			category: jQuery(this).attr('rel_cat'),
			tag: jQuery(this).attr('rel_tag')
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		jQuery.post(ajaxurl, data, function(response) {
			console.log(response);
			jQuery('#gallery').html(response);
		});
	});
});
</script>

<?php get_footer(); ?>