<?php
/*
Plugin Name: Weather
Version: 1.0.0
Author: Aleksandar Kanjevac
Text Domain: weather
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

// Define plugin paths and URLs
define( 'WEATHER_URL', plugin_dir_url( __FILE__ ) );
define( 'WEATHER_DIR', plugin_dir_path( __FILE__ ) );

// Enqueue AJAX script
include( WEATHER_DIR . 'includes/enqueue.php');

// Create Plugin Admin Menus and Setting Pages
include( WEATHER_DIR . 'includes/weather-menu.php');

// Create Settings Fields
include( WEATHER_DIR . 'includes/weather-settings-page-fields.php');

// Create Shortcode for location
include( WEATHER_DIR . 'includes/weather-shortcode.php');

// Create Action for AJAX
include( WEATHER_DIR . 'includes/weather-ajax.php');

