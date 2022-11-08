<?php

function weather_location_settings_page()
{
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }
  include( WEATHER_DIR . 'admin/templates/settings-page.php');
}

function weather_location_settings_pages()
{
  add_menu_page(
    __( 'Weather', 'weather' ),
    __( 'Weather', 'weather' ),
    'manage_options',
    'weather',
    'weather_location_settings_page',
    'dashicons-cloud-saved',
    1
  );

}
add_action( 'admin_menu', 'weather_location_settings_pages' );

// Add a link to your settings page in your plugin
function weather_add_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=weather">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'weather_add_settings_link' );
