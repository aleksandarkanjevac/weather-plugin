<?php

function weather_location_settings() {

  // If plugin settings don't exist, then create them
  if( !get_option( 'weather_location_settings' ) ) {
      add_option( 'weather_location_settings' );
  }

  // Define (at least) one section for our fields
  add_settings_section(
    // Unique identifier for the section
    'weather_location_settings_section',
    // Section Title
    __( 'City Section', 'weather' ),
    // Callback for an optional description
    'weather_location_settings_section_callback',
    // Admin page to add section to
    'weather'
  );

  add_settings_field(
    // Unique identifier for field
    'weather_location_settings_city_text',
    // Field Title
    __( 'City', 'weather'),
    // Callback for field markup
    'weather_location_settings_city_text_callback',
    // Page to go on
    'weather',
    // Section to go in
    'weather_location_settings_section'
  );

  register_setting(
    'weather_location_settings',
    'weather_location_settings'
  );

}
add_action( 'admin_init', 'weather_location_settings' );

function weather_location_settings_section_callback() {

  esc_html_e( 'Enter the city', 'weather' );

}

function weather_location_settings_city_text_callback() {

  $options = get_option( 'weather_location_settings' );

	$city_name = '';
	if( isset( $options[ 'city_name' ] ) ) {
		$city_name = esc_html( $options['city_name'] );
	}

  echo '<input type="text" id="weather_city" name="weather_location_settings[city_name]" value="' . $city_name . '" />';

}