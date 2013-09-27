<?php
/*
 * Template Name: Video Gallery Page
 *
*/

get_header(); ?>
<script>
            jQuery(document).ready(function($) {
			var isMobile = navigator.userAgent.match(/Mobile/i) != null;
            if (isMobile) {
            $(".lightbox").attr("class", "");
            $(".gallery").attr("class", "");
            $(".fancybox").attr("class", "");
            $(".jig-loaded").attr("class", "vid-link");
            }
            });
            </script>
<div id="page-wrapper" class="clear-fix" style="">
        <div id="primary" class="content-area">        
        	<div id="content" class="site-content" role="main">
				<div class="category-title-bg clearfix"><h1 class="page-title"> <?php single_post_title();  ?></h1></div>
	
				
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
				</div></div><div style="clear:both;"></div>
			
		
            
				<article class="post type-post format-standard hentry category-news">

					<div class="entry-content" id="gallery">					
<?php 
$gallerytag = $_GET['gallerytag'];
if ($gallerytag == '') $gallerytag = 'video';
$tag_link = 'http://matdunlap.com/stag/video/';

global $wpdb;
$tp = "dswp_";

$pid_list = (array)$wpdb->get_results("
			SELECT {$tp}posts.ID
			FROM {$tp}terms, {$tp}term_taxonomy, {$tp}term_relationships, {$tp}posts
			WHERE {$tp}term_taxonomy.taxonomy = 'post_tag'
			AND {$tp}term_taxonomy.term_id = {$tp}terms.term_id
			AND {$tp}term_taxonomy.term_taxonomy_id = {$tp}term_relationships.term_taxonomy_id
			AND {$tp}term_relationships.object_id = {$tp}posts.ID
			AND {$tp}terms.name like '{$gallerytag}'
			AND {$tp}posts.post_type='attachment'
		");
				

		$pid_array = "";
		foreach($pid_list as $pid){
			$pid_array .= $pid->ID . ",";
		}
		

		$pid_array = substr($pid_array, 0, strlen($pid_array)-1);

		if ($gallerytag == '%')
			$pid_array = "473,474,475,476,477,478,479,454,455,456,457,458,459"; ?>

						<?php echo do_shortcode("[gallery link='file' ids='{$pid_array}']"); ?>
						
					
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'page' ); ?>				
						<?php endwhile; // end of the loop. ?>

						<?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'StagDining' ), 'after' => '</div>' ) ); ?>
						
					</div><!-- .entry-content -->

				</article>
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

    <div id="secondary" class="widget-area" role="complementary">

				<aside id="archives" class="widget">
					<h1 class="widget-title">Choose a Gallery</h1>
                    <div id="tags">
<?php 
	
		$pid_array = "(" . $pid_array . ")";

$tag_list = (array)$wpdb->get_results("
			SELECT {$tp}terms.term_id as tag_ID,
				{$tp}terms.name as tag_name,
				{$tp}term_taxonomy.count as count
			FROM {$tp}terms, {$tp}term_taxonomy, {$tp}term_relationships, {$tp}posts
			WHERE {$tp}term_taxonomy.taxonomy = 'post_tag'
			AND {$tp}term_taxonomy.term_id = {$tp}terms.term_id
			AND {$tp}term_taxonomy.term_taxonomy_id = {$tp}term_relationships.term_taxonomy_id
			AND {$tp}term_relationships.object_id = {$tp}posts.ID
			AND {$tp}posts.ID in {$pid_array}
			
			GROUP BY tag_name
			ORDER BY count desc
		");

		foreach($tag_list as $tag){
			if ($tag->tag_name == 'Photos') continue;
			if ($tag->tag_name == 'Dinners') continue;
			if ($tag->tag_name == 'Video') continue;		
			echo "<a href='$tag_link?gallerytag=$tag->tag_name'>" .$tag->tag_name . "</a>";
		}
		
?>

    <?php $args = array(
    'number'    => 0,  
    'format'    => 'flat',
    'orderby'   => 'count', 
    'order'     => 'DESC',
    'exclude'     => ' 46,47',
    'link'      => 'view', 
    'taxonomy'  => 'ngg_tag', // Get next gen tags not post tags
    'echo'      => true ); ?>
 
<?php //ng_tag_cloud($args); ?>
    </div>
				</aside>
		</div><!-- #secondary .widget-area -->



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