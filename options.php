<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/inc/images/';
	
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	$options[] = array(
		'name' => __('Homepage', 'options_framework_theme'),
		'type' => 'heading');

		$options[] = array(
			'name' => __('Add your introductory message', 'options_framework_theme'),
			'desc' => __('Your introductory message for the homepage.', 'options_framework_theme'),
			'id' => 'intro_text',
			'std' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Change this in your Theme Options.',
			'type' => 'text');

		$options[] = array(
			'name' => __('Select a Featured Category', 'options_framework_theme'),
			'desc' => __('Select your featured category for your home page. ', 'options_framework_theme'),
			'id' => 'example_select_categories',
			'type' => 'select',
			'options' => $options_categories);

		
			$options[] = array(
				'name' => __('General Settings', 'options_framework_theme'),
				'type' => 'heading');

	$options[] = array(
		'name' => __('Upload your own logo', 'options_framework_theme'),
		'desc' => __('For best results, please use the following dimensions: 1000px x 50px.', 'options_framework_theme'),
		'id' => 'logo_img',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Google Analytics Property ID', 'options_framework_theme'),
		'desc' => __('Add your Google Analytics property ID here. You only need the ID. For example: UA-XXXXX-X', 'options_framework_theme'),
		'id' => 'google_analytics',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');



			$options[] = array(
				'name' => __('Footer', 'options_framework_theme'),
				'type' => 'heading' );

			$options[] = array(
				'name' => __('Textarea', 'options_framework_theme'),
				'desc' => __('Enter your custom footer information.', 'options_framework_theme'),
				'id' => 'footer_info',
				'std' => '',
				'type' => 'textarea');

	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php
}