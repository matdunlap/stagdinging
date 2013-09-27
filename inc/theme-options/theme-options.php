<?php
/**
 * StagDining Theme Options
 *
 * @package StagDining
 * @since StagDining 1.6
 */

/**
 * Register the form setting for our StagDining_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, StagDining_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are properly
 * formatted, and safe.
 *
 * @since StagDining 1.0.1
 */
function StagDining_theme_options_init() {

	register_setting(
		'StagDining_options', // Options group, see settings_fields() call in StagDining_theme_options_render_page()
		'StagDining_theme_options', // Database option, see StagDining_get_theme_options()
		'StagDining_theme_options_validate' // The sanitization callback, see StagDining_theme_options_validate()
	);

	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see StagDining_theme_options_add_page()
	);

	// Register our individual settings fields
	add_settings_field(
		'intro_text', // Unique identifier for the field for this section
		__( 'Brief introductory message', 'StagDining' ), // Setting field label
		'StagDining_settings_field_intro_text', // Function that renders the settings field
		'theme_options', // Menu slug, used to uniquely identify the page; see StagDining_theme_options_add_page()
		'general' // Settings section. Same as the first argument in the add_settings_section() above
	);
	add_settings_field( 'primary_category', __( 'Primary Featured Category', 'StagDining' ), 'StagDining_settings_field_primary_category', 'theme_options', 'general' );
	
		add_settings_field( 'footer_text', __( 'Custom Footer Info', 'StagDining' ), 'StagDining_settings_field_footer_text', 'theme_options', 'general' );
}
add_action( 'admin_init', 'StagDining_theme_options_init' );

/**
 * Change the capability required to save the 'StagDining_options' options group.
 *
 * @see StagDining_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see StagDining_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function StagDining_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_StagDining_options', 'StagDining_option_page_capability' );

/**
 * Add our theme options page to the admin menu.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since StagDining 1.0.1
 */
function StagDining_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'StagDining' ),   // Name of page
		__( 'Theme Options', 'StagDining' ),   // Label in menu
		'edit_theme_options',          // Capability required
		'theme_options',               // Menu slug, used to uniquely identify the page
		'StagDining_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', 'StagDining_theme_options_add_page' );

// Return an array of all categories (so that the user can pick one to feature on the news template)
function StagDining_primary_category() {

	$primary_category = get_categories();

	return apply_filters( 'StagDining_primary_category', $primary_category );
}

/**
 * Returns the default options for StagDining 1.0.1.
 */
function StagDining_get_default_theme_options() {
	$default_theme_options = array(
		'primary_category' => '1',
		'intro_text' => '',
		'footer_text'       => '',
		);

	return apply_filters( 'StagDining_default_theme_options', $default_theme_options );
}

/**
 * Returns the options array for StagDining 1.0.1.
 */
function StagDining_get_theme_options() {
	return get_option( 'StagDining_theme_options', StagDining_get_default_theme_options() );
}

/**
 * Renders the introductory message setting
 */
function StagDining_settings_field_intro_text() {
	$options = StagDining_get_theme_options();
	?>
	<input type="text" name="StagDining_theme_options[intro_text]" id="intro-text" value="<?php echo esc_attr( stripslashes ( $options['intro_text'] ) ); ?>" size="50" />
	<label class="description" for="intro-text"><?php _e( 'Appears below the slider on the home page template', 'StagDining' ); ?></label>
	<?php
}

/**
 * Renders the primary category setting
 */
function StagDining_settings_field_primary_category() {
	$options = StagDining_get_theme_options();
	?>
	<select name="StagDining_theme_options[primary_category]" id="primary-category">
		<?php
			if ( ! isset( $selected ) )
				$selected = '';
			foreach ( StagDining_primary_category() as $option ) {
				$selected_option = $options['primary_category'];
				if ( '' != $selected_option ) {
					if ( $options['primary_category'] == $option->term_id ) {
						$selected = "selected=\"selected\"";
					} else {
						$selected = '';
					}
				}
				?>
				<option value="<?php echo $option->term_id; ?>" <?php echo $selected; ?> />
					<?php echo $option->name; ?>
				</option>
			<?php } ?>
	</select>
	<label class="description" for="StagDining_theme_options[primary_category]"><?php _e( 'Choose a primary featured category for posts on the home Page template', 'StagDining' ); ?></label>
	<?php
}

/**
 * Renders the footer info setting field.
 */
function StagDining_settings_field_footer_text() {
	$options = StagDining_get_theme_options();
	?>
	<textarea class="large-text" type="text" name="StagDining_theme_options[footer_text]" id="footer-text" cols="50" rows="10" /><?php echo esc_textarea( $options['footer_text'] ); ?></textarea>
	<label class="description" for="footer-text"><?php _e( 'Custom Footer Information', 'StagDining' ); ?></label>
	<?php
}

/**
 * Renders the Theme Options administration screen.
 *
 * @since StagDining 1.0.1
 */
function StagDining_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
		<h2><?php printf( __( '%s Theme Options', 'StagDining' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'StagDining_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see StagDining_theme_options_init()
 * @todo set up Reset Options action
 *
 * @param array $input Unknown values.
 * @return array Sanitized theme options ready to be stored in the database.
 *
 * @since StagDining 1.0.1
 */
function StagDining_theme_options_validate( $input ) {
		$output = $defaults = StagDining_get_default_theme_options();


	// The text input must be safe text with no HTML tags
	if ( isset( $input['intro_text'] ) && ! empty( $input['intro_text'] ) )
		$output['intro_text'] = wp_filter_nohtml_kses( $input['intro_text'] );
		
	// The Custom Footer info must be safe text with the allowed tags for posts
	if ( isset( $input['footer_text'] ) && ! empty( $input['footer_text'] ) )
		$output['footer_text'] = wp_filter_post_kses( $input['footer_text'] );

	// Set the primary category ID to "1" if the input value is not in the array of categories.
	if ( array_key_exists( $input['primary_category'], StagDining_primary_category() ) ) :
		$options['primary_category'] = $input['primary_category'];
	else :
		$options['primary_category'] = 1;
	endif;

	return $input;
}